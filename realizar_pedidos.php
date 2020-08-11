<?php require 'pages/header.php'; ?>
<?php 
	
	include 'Config.php';	

	include 'lanches.class.php';

	include 'clientes.class.php';

	$lanches = new Lanche($pdo);

	$clientes = new Cliente($pdo);


	if(isset($_GET['acao'])){
		switch ($_GET['acao']) {

			case 'concluir':

				$lanches->finalizarPedido($_GET['id']);

				echo 'Pedido'.$_GET['id'].' Finalizado, obrigado pela prefêrencia...';

				break;

		}
	}




?>
<div style="position: relative; left: 400px; top: -10px; padding-top: 40px;">
<h2> Pedidos </h2>

<form method="POST" action="pedidos_submit.php">

<label><strong> Nome: </strong></label><br>
<input type="text" name="nome" id="nome" required><br>


<label><strong> email: </strong></label><br>
<input type="email" name="email" id="email" required><br>

<label><strong> Lanche: </strong></label><br>
<select class="selectpicker" name="opcao">


<?php
	$lista = $lanches->getAll();
	foreach($lista as $item):
		?>

	<option><?php echo $item['nome' ]; ?></option>

<?php endforeach;?>
</select>

<br><br>

<button class="btn btn-primary" type="submit" name="submit" value="enviar"> Enviar </button>

</form>

<table class="table" style="width: 350px; position: relative; top: -280px; right: 380px;">

<thead class="thead-dark">

<tr>
	<th>Id</th>
	<th>Nome</th>
	<th>Pedido</th>
	<th>finalizar</th>
</tr>
<?php 
	$lista = $lanches->selecionarPedidos();
	foreach($lista as $item):
?>
<tr>
	<td><?php echo $item['id']?></td>
	<td><?php echo $item['nome'];?></td>
	<td><?php echo $item['lanche']?></td>
	<td name="concluir"><a href="?acao=concluir&id=<?=$item['id']?>">Pronto</td></a>
</tr>

<?php endforeach;?>

</table>

</div>




<?= require 'pages/footer.php'; ?>
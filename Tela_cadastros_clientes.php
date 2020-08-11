<?php require 'pages/header.php'?>

<?php
	
	include 'config.php'; 
	include 'clientes.class.php';

	$clientes = new Cliente($pdo);

		if(isset($_GET['acao'])){
		switch ($_GET['acao']) {
		case 'delet':
		$clientes->deletarCliente($_GET['id']);
			echo 'excluir um registro do banco de dados'.$_GET['id'];
			break;
	}
}
?>

<br/>

<div Style="width: 200px; position: relative; left: 180px; top: -42px;">

<label Style="width: 200px; position: relative; left: -60px; top: 36px;"><b> Buscar:  </b></label>

<input class="form-control" 
id="myInput" type="text" placeholder="Search..">

</div>

<table class="table" action="cadastro_submit.php" style="margin-top: -36px; width: 1200px;position: relative; left: 60px">

<thead class="thead-dark">

<tr>
	<th scope="col">ID</th>
	<th scope="col">NOME</th>
	<th scope="col">E-MAIL</th>
	<th scope="col">ENDERECO</th>
	<th scope="col">AÇÕES</th>
</tr>
<?php 
	$lista = $clientes->getAll();
	
	foreach ($lista as $item):
?>
<tr>
	<tbody id="myTable">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td><?php echo $item['endereco']; ?></td>
		<td name="delet"><a href="editar_cliente.php?id=<?php echo $item['id']; ?>"> EDITAR | </a><a href="?acao=delet&id=<?=$item['id']?>">EXCLUIR</a></td>
	</tbody>				
	</tr>	
<?php endforeach;?>	

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

</table>	
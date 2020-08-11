<?php 
	require 'pages/header.php';
?>

<?php
	include 'Config.php';

	$usuarios = new Usuarios($pdo);

?>


<div style="padding-top: 200px">

<table class="table" style="margin-top: 10px; width: 1200px;position: relative; left: 60px; top: -208px;">

<thead class="thead-dark">

<tr>
	<th>ID</th>
	<th>EMAIL</th>
	<th>SENHA</th>
	<th>PERMISSOES</th> 
	<th>AÇÕES</th>
</tr>

<?php 
	
	$lista = $usuarios->getAll();
	foreach($lista as $item):

?>

<tr>
	<td><?php echo $item['id']; ?></td>
	<td><?php echo $item['email']; ?></td>
	<td><?php echo $item['senha']; ?></td>
	<td><?php echo $item['permissoes']; ?></td>
	<td name="delet"><a href="editar_usuario.php?id=<?php echo $item['id']; ?>"> EDITAR | </a> <a href="excluir_usuario.php?id=<?php echo $item['id']; ?>"> EXCLUIR </a></td>

</tr>
<?php endforeach;?>

</table>

</div>

<?php
	require 'pages/footer.php'
?>
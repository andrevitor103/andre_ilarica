<?php
	require 'pages/header.php';
?>

<?php

	include 'Config.php';

	include 'lanches.class.php';

	$lanches = new Lanche($pdo);
	
	$teste = 'ver';

?>

<div Style="width: 200px; position: relative; left: 180px; top: -28px;">

<label Style="width: 200px; position: relative; left: -60px; top: 36px;"><b> Buscar:  </b></label>

<input class="form-control" 
id="myInput" type="text" placeholder="Search..">

</div>


<div style="padding-top: 200px">

<table class="table" <?=($teste == 'ver')?('!hidden'):('hidden')?> action="cadastro_submit.php" style="margin-top: 10px; width: 1200px;position: relative; left: 60px; top: -226px;">

<thead class="thead-dark">

<tr>
	<th>ID</th>
	<th>NOME</th>
	<th>VALOR</th>
	<th>AÇÕES</th> 
</tr>

<?php 
	
	$lista = $lanches->getAll();
	foreach($lista as $item):

?>

<tr>
	<tbody id="myTable">
	<td><?php echo $item['id']; ?></td>
	<td><?php echo $item['nome']; ?></td>
	<td><?php echo $item['valor']; ?></td>
	<td name="delet"><a href="editar.php?id=<?php echo $item['id']; ?>"> EDITAR | </a> <a href="excluir.php?id=<?php echo $item['id']; ?>"> EXCLUIR </a></td>

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

</div>

<?php
	require 'pages/footer.php'
?>
<?php
	require 'pages/header.php';
?>

<?php
	include 'Config.php';	

	include 'lanches.class.php';
	$lanches = new Lanche($pdo);

?>

<div style="padding-top: 200px">

<table class="table" action="cadastro_submit.php" style="margin-top: 10px; width: 1200px;position: relative; left: 60px; top: -208px;">

<thead class="thead-dark">

<tr>
	<th>NOME</th>
	<th>VALOR</th>
	<th>AÇÕES</th> 
</tr>

<br>
<?php
	
	$dados = $lanches->getAll();	

	$json_teste = array();

	foreach($dados as $item) {
		$json_teste[] = $item;
	}

	$json = json_encode($json_teste);

	//echo $json;

	?>

<script type="text/javascript">
	
	console.log(<?php echo $json; ?>);

	var dados = <?php echo $json; ?>;

	var i = 0;
	var nomes = [];
	var valores = [];
	var id = [];

	while(i < dados.length){

	id.push(dados[i]['id']);	
	nomes.push(dados[i]['nome']);
	valores.push(dados[i]['valor']);
	i++;

	
}
	window.onload = myFunction;

	function myFunction(){

		alert("oii");

		var teste = 0;

		while(teste < nomes.length){

		document.getElementById("nome").innerHTML += nomes[teste] + "<br>";
		document.getElementById("valor").innerHTML += valores[teste] + "<br>";
		document.getElementById("funcoes").innerHTML += '<a href="editar.php?id=<?php echo $item['id']; ?>"> EDITAR | </a> <a href="excluir.php?id=<?php echo $item['id']; ?>"> EXCLUIR </a>' + "<br>";
		document.getElementById("tabela").innerHTML += " ";
		teste++;
	}
		
	}

</script>


<!-- teste javascript -->

<script type="text/javascript">
		function ola(){
			alert(document.getElementById('texto').value);
			document.getElementById("texto").value = null;
		}

</script>



<!--
<input type="text" id="texto" ></input>
<button onclick="myFunction()" type="button"> click aqui </button>
-->


<tr id="tabela">
	<td id="nome"></td>
	<td id="valor"></td>
	<td name="delet" id="funcoes"></td>

</tr>

</table>

</div>




<br><br><br><br><br><br><br><br>
<?php
	require 'pages/footer.php'
?>

<?php
	
	include 'Config.php';

	include 'lanches.class.php';

	$lanches = new lanche($pdo);	

	if(!empty($_POST['nome'])){

		$nome = $_POST['nome'];
		$valor = $_POST['valor'];
		$imagem = $_FILES['imagem']['name'];
		$descricao = $_POST['descricao'];


		$lanches->cadastrarLanche($nome, $imagem, $descricao, $valor);

		header('location: http://localhost/dashboard/ILarica_andre/cadastro_lanches.php');
	}

?>
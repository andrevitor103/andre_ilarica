<?php
	
	include 'Config.php';
	
	include 'lanches.class.php';

	$lanches = new Lanche($pdo);

	if(!empty($_POST['id'])){

		$nome = $_POST['nome'];
		$valor = $_POST['valor'];
		$id = $_POST['id'];

		if(!empty($valor)){

			$lanches->editar($nome, $valor, $id);

		}

		header("Location: /dashboard/ilarica_andre/");
	}

?>
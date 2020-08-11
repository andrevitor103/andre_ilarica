<?php
	
	include 'config.php';
	
	include 'clientes.class.php';

	$clientes = new Cliente($pdo);

	if(!empty($_POST['id'])){

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$sobrenome = $_POST['sobrenome'];
		$endereco = $_POST['endereco'];
		$id = $_POST['id'];

		if(!empty($nome)){

			$clientes->editar($nome, $email, $sobrenome, $endereco, $id);

		}

		header("Location: /dashboard/ilarica_andre/Tela_cadastros_clientes.php");
	}

?>
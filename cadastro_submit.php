<?php

include 'Config.php';

include 'clientes.class.php';

$clientes = new Cliente($pdo);

if(!empty($_POST['email'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$sobrenome = $_POST['sobrenome'];
	$endereco = $_POST['endereco'];


	$clientes->adicionarCliente($sobrenome, $nome, $email, $endereco);
	
	header('Location: http://localhost/dashboard/ILarica_andre/cadastro.php');	
}


?>
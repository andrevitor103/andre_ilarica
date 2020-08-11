<?php
	
	include 'Config.php';
	
	include 'usuarios.class.php';

	$usuarios = new Usuarios($pdo);

	if(!empty($_POST['id'])){

		$id = $_POST['id'];
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$permissoes = $_POST['permissoes'];

		if(!empty($email)){

			$usuarios->editar($id, $email, $senha, $permissoes);

			header("Location: /dashboard/ilarica_andre/lista_usuarios.php");

		}
	}
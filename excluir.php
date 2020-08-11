<?php 
	
	session_start();

	include 'usuarios.class.php';

	include 'Config.php';
	
	$usuarios = new Usuarios($pdo);

	$usuarios->setUsuario($_SESSION['logado']);

	if($usuarios->temPermissao('DEL') == false){

	header("Location: index.php");

}

	include 'lanches.class.php';

	$lanches = new Lanche($pdo);
	

	
	if($usuarios->temPermissao('DEL') == false){

	header("Location: index.php");

	}

	if(!empty($_GET['id'])){
		$id = $_GET['id'];

		$lanches->deletarLanche($id);

		header('Location: /dashboard/ilarica_andre');

	}

?>
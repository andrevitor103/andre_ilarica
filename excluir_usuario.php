<?php 
	
	session_start();

	include 'usuarios.class.php';

	include 'Config.php';
	
	$usuarios = new Usuarios($pdo);

	$usuarios->setUsuario($_SESSION['logado']);

	if($usuarios->temPermissao('DEL') == false){

	header("Location: index.php");

}
	
	if($usuarios->temPermissao('DEL') == false){

	header("Location: index.php");

	}

	if(!empty($_GET['id'])){
		$id = $_GET['id'];

		$usuarios->excluir($id);

		header('Location: /dashboard/ilarica_andre/lista_usuarios.php');

	}

?>
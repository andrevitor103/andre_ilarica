<?php

include 'Config.php';
include 'usuarios.class.php';

$usuarios = new Usuarios($pdo);

if(!empty($_POST['email'])){
	
	$email = $_POST['email'];
	$senha= md5($_POST['senha']);
	$permissoes = $_POST['permissoes'];

	$usuarios->cadastrarUsuario($email, $senha, $permissoes);

	header("Location: cadastro_usuarios.php");

}else{

	echo '<script type="text/javascript"> alert("Erro ao cadastrar"); </script> ';

	header("Location: cadastro_usuarios.php");

}
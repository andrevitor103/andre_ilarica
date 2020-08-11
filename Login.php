<?php
	session_start();
	include 'config.php';
	include 'usuarios.class.php';

	if(!empty($_POST['email'])){
		$email = addslashes($_POST['email']);
		$senha = md5($_POST['senha']);

		$usuarios = new Usuarios($pdo);

		if($usuarios->fazerLogin($email, $senha)){
			header("Location: index.php");
			exit;
		}else{
			echo "Usuário e/ou senha estão errados!";
		}

	}


?>

<h1> LOGIN </h1>
<form method="POST">

	<label> E-mail: </label><br/>
	<input type="email" name="email" autocomplete="on"><br/><br/>

	<label> Senha: </label><br/>
	<input type="password" name="senha"><br/><br/>

	<input type="submit" value="Entrar">

</form>
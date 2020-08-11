<?php 

	session_start();

	if(isset($_SESSION['logado'])){

		session_destroy();

		header("Location: login.php");

		exit;
	}else{
		header("Location: index.php");
		exit;
	}	


?>
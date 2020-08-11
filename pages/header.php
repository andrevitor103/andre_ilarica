<?php 
	
	session_start();
	include 'Config.php';
	include 'usuarios.class.php';	
	$usuarios = new Usuarios($pdo);

	$usuarios->setUsuario($_SESSION['logado']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>ILarica - Fast Food</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</
	<script type="text/javascript" src="js/teste.js"></script>
</head>
<body>
	<header>
		<a href="index.php"><img class="logo" src="img/i larica .png" alt="Logo ILarica"></a>
	<nav class="menu_opcoes">		
		<ul>
			<?php if($usuarios->temPermissao('SECRET')): ?>

			<li><a href="lista_usuarios.php">Usuarios</a></li>

			<?php endif; ?>

			<li><a href="#">Sua Conta</a></li>
			<li><a href="realizar_pedidos.php">Realizar pedidos</a></li>
			<li><a href="cadastro_lanches.php">Cadastrar lanche</a></li>
			<li><a href="Lista_ifood.php">Lista I Food</a></li>
			<li><a href="tela_lanches.php">Lista I Food imagens</a></li>
			<li><a href="#">Cartão Fidelidade</a></li>
			<li><a href="sobre.php">Sobre</a></li>
			<li><a href="#">Ajuda</a></li>
			<li><a href="cadastro.php">Cadastro</a></li>
			<li><a href="Tela_cadastros_clientes.php">Lista de clientes</a></li>
		</ul>
	</nav>
	</header>
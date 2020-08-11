<?php
	require 'pages/header.php';
?>

<?php
	
		

	
	include 'config.php';
	include 'clientes.class.php';

	$clientes = new Cliente($pdo);

	$usuarios = new Usuarios($pdo);

	$usuarios->setUsuario($_SESSION['logado']);

	if($usuarios->temPermissao('EDIT') == false){

	header("Location: index.php");
}

	if(!empty($_GET['id'])){

		$id = $_GET['id'];
		
		$info = $clientes->getInfo($id);

		if(empty($info['nome'])){

				header("Location: /dashboard/ilarica_andre/Tela_cadastros_clientes.php");
				exit;
			}

		}else{

			header("Location: /dashboard/ilarica_andre/Tela_cadastros_clientes.php");
			exit;

		}
			
?>

<head>
		<title>Cadastro Cliente </title>
		<script type="texto/javascript " src = "js/validacao.js"></script>
</head>
<h2>Cadastro</h2>
<form method="POST" action="editarcliente_submit.php" >
	<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
		<label> Nome: </label><br/>
		<input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br/><br/>
		
		<label> Sobrenome: </label><br/>
		<input type="text" name="sobrenome" value="<?php echo $info['sobrenome']; ?>"><br/><br/>

		<label> Endereco: </label><br/>
		<input type="text" name="endereco" value="<?php echo $info['endereco']; ?>"><br/><br/>
		
		<label> Email: </label><br/>
		<input type="text" name="email" value="<?php echo $info['email']; ?>"><br/><br/>		


		<input type="submit" name="submit" value="Salvar">
</form>	

<?php
	require 'pages/footer.php'
?>
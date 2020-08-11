<?php
	require 'pages/header.php';
?>

<?php

	include 'Config.php';
	
	$usuarios = new Usuarios($pdo);

	$usuarios->setUsuario($_SESSION['logado']);


	if($usuarios->temPermissao('EDIT') == false){

	header("Location: index.php");

}

	if(!isset($_SESSION['logado'])){
		header("Location: login.php");
	exit;

	}

	
	if(!empty($_GET['id'])){

		$id = $_GET['id'];
		$info = $usuarios->getInfo($id);

		}else{

			header("Location: /dashboard/ilarica_andre/lista_usuarios.php");
			exit;

		}
			
?>

<h2>Cadastro lanches</h2>

<form method="POST" action="editar_usuario_submit.php" >

<input type="hidden" name="id" value="<?php echo $info['id']; ?>">

<label> Email: </label><br/>

<input type="text" name="email" value="<?php echo $info['email']; ?>"><br/><br/>
		
<label> Senha: </label><br/>

<input type="password" name="senha"><br/><br/>


<label> Permissoes: </label><br/>

<input type="text" name="permissoes" value="<?php echo $info['permissoes']; ?>"><br/><br/>

<input type="submit" name="submit" value="Salvar">

</form>


<?php
	require 'pages/footer.php'
?>
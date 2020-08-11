<?php require 'pages/header.php'?>

<?php 
	
	include 'Config.php';

	include 'lanches.class.php';

	$lanches = new lanche($pdo);

	$usuarios = new Usuarios($pdo);

	$usuarios->setUsuario($_SESSION['logado']);

	if($usuarios->temPermissao('ADD') == false){

	header("Location: index.php");
}

if(isset($_SESSION['msg']))	{

	echo $_SESSION['msg'];
	unset($_SESSION['msg']);

}
		

?>

<head>
		<title>Cadastro lanches </title>

		<script type="texto/javascript " src = "js/validacao.js"></script>
		
</head>

<h2>Cadastro lanches</h2>
<form method="POST" action="cadastroslanches_submit.php" enctype="multipart/form-data">
	<fieldset>
		<b>Nome:</b><br>
		<input type="text" name="nome" id="nome" autofocus required="required" autocomplete="off"><br>
		
		<b>valor:</b><br>
		<input type="text" name="valor" id="valor" required="required" autocomplete="off"><br>

		<br><input type="file" name="imagem" id="imagem"><br>

		<br><b>Descrição do lanche:</b><br>
		<textarea name="descricao" id="descricao" rows="6" cols ="30"> </textarea>

		<input type="submit" name="submit" value="Cadastrar">

	</fieldset>
</form>	

<?php require 'pages/footer.php'?>
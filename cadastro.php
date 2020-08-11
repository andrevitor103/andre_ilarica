<?php require 'pages/header.php'?>

<?php

include 'config.php';
include 'clientes.class.php';

$clientes = new Cliente($pdo);
$usuarios = new Usuarios($pdo);

$usuarios->setUsuario($_SESSION['logado']);

if($usuarios->temPermissao('ADD') == false){

	header("Location: index.php");
}

?>

<head>
		<title>Cadastro Cliente </title>
		<script type="texto/javascript " src = "js/validacao.js"></script>
</head>
<h2>Cadastro</h2>
<form method="POST" action="cadastro_submit.php" >
	<fieldset>
		<b>Nome:</b><br>
		<input type="text" name="nome" id="nome" autofocus required="required" autocomplete="off"><br>
		<b>Sobrenome:</b><br>
		<input type="text" name="sobrenome" id="sobrenome" required="required" autocomplete="off"><br>
		<b>Sexo:</b><br>
		<input type="radio" name="gender" value="masculino" checked> Masculino<br>
		<input type="radio" name="gender" value="feminino"> Feminino<br>
		<input type="radio" name="gender" value="outro"> Outro<br>
		<b>Email:</b><br>
		<input type="Email" name="email"required="required">

		<br><b>CEP </b><br>
		<input type="text" name="cep" id="cep" required="required" onkeyup="arrumaCep();" onblur="pesquisacep(this.value);";>

		<br><b>Endereço </b><br>
		<input type="text" name="endereco" id="endereco" required="required">
		<b>Estado</b>:
			<select name="Estado">
				<option value="parana"> Paraná </option>
				<option value="santa catarina"> Santa Catarina </option>
				<option value="rio grande do sul"> Rio Grande do Sul </option>
			</select>
		<br><b>Informe a quantidade do pedido:</b><br>
		<input type="text" name="qtde" id="qtde">
		<br><b>Descrição do pedido:</b><br>
		<textarea name="descricao" rows="10" cols ="30"> </textarea>
		<input type="submit" name="submit" value="Enviar">
	</fieldset>
</form>	

<?php require 'pages/footer.php'?>
<?php 
	require 'pages/header.php';
?>

<form method="POST" action="cadastro_usuarios_submit.php" >

<label><b> Email:  </b></label><br/>

<input type="email" name="email" id="email" required="required" autofocus autocomplete="on" ><br/><br/>


<label><b> Senha:  </b></label><br/>

<input type="password" name="senha" id="senha" required="required" autocomplete="on" ><br/><br/>


<label><b> Permissoes:  </b></label><br/>

<input type="text" name="permissoes" id="permissoes" required="required" autocomplete="on" ><br/><br/>


<input type="submit" name="salvar" value="Salvar"><br/><br/>




</form>




<?php 
	require 'pages/footer.php';
?>
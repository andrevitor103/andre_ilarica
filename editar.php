<?php
	require 'pages/header.php';
?>

<?php
	
	session_start();

	include 'usuarios.class.php';

	include 'Config.php';

	include 'lanches.class.php';

	$lanches = new lanche($pdo);
	
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
		$info = $lanches->getInfo($id);
		
			if(empty($info['valor'])){

				header("Location: /dashboard/ilarica_andre/Lista_ifood.php");
				exit;
			}

		}else{

			header("Location: /dashboard/ilarica_andre/Lista_ifood.php");
			exit;

		}
			
?>

<h2>Cadastro lanches</h2>

<form method="POST" action="editar_submit.php" >

<input type="hidden" name="id" value="<?php echo $info['id']; ?>">

<label> Nome: </label><br/>

<input type="text" name="nome" value="<?php echo $info['nome']; ?>"><br/><br/>
		
<label> valor: </label><br/>

<input type="text" name="valor" value="<?php echo $info['valor']; ?>"><br/><br/>

<input type="submit" name="submit" value="Salvar">

</form>


<?php
	require 'pages/footer.php'
?>
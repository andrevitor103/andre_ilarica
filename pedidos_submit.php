<?php
	
	require 'Funcoes.class.php';
	
	require_once('src/PHPMailer.php');
	require_once('src/SMTP.php');
	require_once('src/Exception.php');
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	include 'Config.php';

	include 'lanches.class.php';

	$lanches = new Lanche($pdo);

	$funcoes = new Funcoes();


	if(!empty($_POST['nome'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$opcao = $_POST['opcao'];
		$mensagem = "
		<h2>$nome seu pedido está pronto!!</h2>	
		<strong>Pedido finalizado, muito obrigado pela preferencia !!</Strong>
		<img src='https://loja.kadeshonline.com.br/wp-content/uploads/2020/07/i-larica-.png' alt='Logo ILarica'>";


		$lanches->cadastrarPedido($email, $nome,$opcao);

	}


		


if(empty($email)){
echo "Errooooooo";

}else{


$mail = new PHPMailer(true);

$mail= new PHPMailer;
$mail->IsSMTP();        // Ativar SMTP
$mail->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
$mail->SMTPAuth = true;     // Autenticação ativada
$mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
$mail->Host = 'smtp.gmail.com'; // SMTP utilizado
$mail->Port = 465;
$mail->Username = 'andrevitor103@gmail.com';
$mail->Password = '45693782011';
$mail->SetFrom('andrevitor103@gmail.co');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = $funcoes->tratarCaracter('Ótima notícia para sua fome '.$nome.'!!',1);
$mail->Body = $funcoes->tratarCaracter('<Strong>'.$mensagem.'</Strong>', 1);
$mail->AltBody = 'mensagem';
if ($mail->send()){
    $ok = true;
}else{
    $ok = false;
}
}

header('location: realizar_pedidos.php');
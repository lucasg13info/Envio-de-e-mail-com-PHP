<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];


$mail = new PHPMailer(true);
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'zzzzz@zzzz.com.br'; //login com e-mail de origem
	$mail->Password = 'zzzzzz'; //senha e-mail de origem
	$mail->Port = 587;
 
	$mail->setFrom('zzz@xxxxx.com.br'); //Origem. Aparece no e-mail como "de".
	$mail->addAddress('aaaaa@aaaa.com.br'); //Destino, quem vai receber o e-mail.
	
 
	$mail->isHTML(true);
	$mail->Subject = 'Teste de email via gmail'; //Assunto do e-mail
	$mail->Body = ("Olá Dr, <br><br>Acabamos de reeber mais uma mensagem de: <br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem"); //Texto do e-mail
	$mail->AltBody = 'Chegou o email teste ';
 
	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

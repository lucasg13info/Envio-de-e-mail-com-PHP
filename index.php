<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);
 
try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'seuemail@gmail.com'; //login com e-mail de origem
	$mail->Password = '123'; //senha e-mail de origem
	$mail->Port = 587;
 
	$mail->setFrom('seuemail@gmail.com'); //Origem. Aparece no e-mail como "de".
	$mail->addAddress('seuemail@gmail.com'); //Destino, quem vai receber o e-mail.
	$mail->addAddress('seuemail@gmail.com');
 
	$mail->isHTML(true);
	$mail->Subject = 'Teste de email via gmail'; //Assunto do e-mail
	$mail->Body = 'Chegou o email teste do <strong>Canal TI</strong>'; //Texto do e-mail
	$mail->AltBody = 'Chegou o email teste ';
 
	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

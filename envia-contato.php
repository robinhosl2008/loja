<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 21/11/16
 * Time: 15:16
 */

session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$msg = $_POST['msg'];

/*
// Inclui o arquivo class.phpmailer.php.
require_once 'PHPMailer/PHPMailerAutoload.php';


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'robinhosl2008@gmail.com';
    $mail->Password = '2008Robinhosl';

    $mail->setFrom('robinhosl2008@gmail.com', 'Contato Cadastro Produtos');
    $mail->addAddress('robinhosl2008@gmail.com');
    $mail->Subject = "$assunto";
    $mail->msgHTML("
        <html>
            Dê: ".$nome."<br />
            E-mail: ".$email."<br /><br />
            Mensagem: ".$msg."
        </html>");
    $mail->AltBody = "De: ".$nome."\nE-mail: ".$email."\n\n\nMensagem: ".$msg;


if($mail->send()) {
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "Entraremos em contato por e-mail em breve.";
}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "Não foi possível enviar a mensagem. Erro: ".$mail->ErrorInfo;
}

header('location: mo.php');
die();
*/


if(mail($nome .' <contato@cadastroprodutos.esy.es>', $assunto, "De: {$nome} \nE-mail: {$email} \n\nMensagem: {$msg}")){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "Entraremos em contato por e-mail em breve.";
}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "Não foi possível enviar a mensagem.";
}

header('location: index.php');
die();
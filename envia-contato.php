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


if(mail($nome .' <contato@cadastroprodutos.esy.es>', $assunto, "De: {$nome} \nE-mail: {$email} \n\nMensagem: {$msg}")){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "Entraremos em contato por e-mail em breve.";
}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "Não foi possível enviar a mensagem.";
}

header('location: index.php');
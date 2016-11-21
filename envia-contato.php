<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 21/11/16
 * Time: 15:16
 */

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$msg = $_POST['msg'];

mail($nome.' <contato@cadastroprodutos.esy.es>', $assunto, $msg);
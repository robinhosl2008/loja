<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 17/11/16
 * Time: 16:16
 */
require_once('banco-categoria.php');
session_start();
if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
}

if(isset($_POST['id']) && $_POST['id'] != ""){

    if(removeCategoria($_POST['id'])){
        $_SESSION['acao'] = "Sucesso!";
        $_SESSION['resultado'] = "A categoria foi apagada.";
    }else{ $msg_error = mysqli_error($conexao);
        $_SESSION['acao'] = "Atenção!";
        $_SESSION['resultado'] = "A categoria não pode ser apagada. Erro: ".$msg_error;
    }

    header('location: categoria-formulario.php');
    die();
}
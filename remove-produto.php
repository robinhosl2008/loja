<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 25/10/2016
 * Time: 11:58
 */

session_start();

if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
}

require_once('banco-produto.php');

$id = $_POST['id'];

$result = removeProduto($id);

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto foi deletado.";
    header('location: produto-lista.php?acao=true');
}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto não foi deletado.";
    header('location: produto-lista.php?acao=false');
}
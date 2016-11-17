<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 25/10/2016
 * Time: 11:58
 */

if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
}

include('banco-produto.php');
//require_once('banco-produto.php');

$id = $_POST['id'];

$result = removeProduto($id);

if($result == true){
    header('location: produto-lista.php?acao=true');
}else{ $msg_error = mysqli_error($conexao);
    header('location: produto-lista.php?acao=false');
}
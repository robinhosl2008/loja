<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:14
 */

require_once('logica-usuario.php');
require_once('banco-produto.php');
require_once('class/Produto.php');

verificaUsuario();

$produto = new Produto();

$produto->no_produto = $_POST['nome'];
$produto->preco = $_POST['preco'];

if(array_key_exists('usado',$_POST)):
    $produto->usado = "true";
else:
    $produto->usado = "false";
endif;

$produto->id_categoria = $_POST['categoria'];
$produto->descricao = $_POST['descricao'];

$resultCadastro = insereProduto($produto);

if($resultCadastro == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto $produto->no_produto foi cadastrado.";
    header('location: produto-lista.php');
}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto não foi cadastrado.";
    header('location: produto-lista.php');
}




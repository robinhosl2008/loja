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
require_once('class/Categoria.php');

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria']);

$produto = new Produto();
$produto->setNoProduto($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);

if(array_key_exists('usado',$_POST)):
    $produto->setUsado("true");
else:
    $produto->setUsado("false");
endif;

$resultCadastro = insereProduto($produto);

if($resultCadastro == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto ".$produto->getNoProduto()." foi cadastrado.";
    header('location: produto-lista.php');
}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto ".$produto->getNoProduto()." não foi cadastrado.";
    header('location: produto-lista.php');
}




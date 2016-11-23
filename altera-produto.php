<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 27/10/2016
 * Time: 20:29
 */

session_start();

require_once("banco-produto.php");
require_once('logica-usuario.php');
require_once('class/Produto.php');
require_once('class/Categoria.php');

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria']);

$produto = new Produto();
$produto->setId($_POST['id']);
$produto->setNoProduto($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);

if(array_key_exists('usado', $_POST)):
    $produto->setUsado("true");
else:
    $produto->setUsado("false");
endif;

$result = alteraProduto($produto);

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto ".$produto->getNoProduto()." foi alterado.";

}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto ".$produto->getNoProduto()." não foi alterado.";
}

header('location: produto-lista.php');
die();
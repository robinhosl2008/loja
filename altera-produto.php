<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 27/10/2016
 * Time: 20:29
 */

session_start();

require_once("cabecalho.php");
require_once('logica-usuario.php');

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria']);

$no_produto = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

if(array_key_exists('usado', $_POST)):
    $usado = 1;
else:
    $usado = 0;
endif;

$produto = new Produto($no_produto, $preco, $usado, $categoria, $descricao);
$produto->setId($_POST['id']);

$produtoDAO = new ProdutoDAO(getConnection());
$result = $produtoDAO->alteraProduto($produto);

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto ".$produto->getNoProduto()." foi alterado.";

}else{
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto ".$produto->getNoProduto()." não foi alterado.";
}

header('location: produto-lista.php');
die();
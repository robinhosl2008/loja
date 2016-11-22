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

verificaUsuario();

$produto = new Produto();

$produto->id = $_POST['id'];
$produto->no_produto = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$produto->id_categoria = $_POST['categoria'];

if(array_key_exists('usado', $_POST)):
    $produto->usado = "true";
else:
    $produto->usado = "false";
endif;

$result = alteraProduto($produto);

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto $produto->no_produto foi alterado.";

}else{ $msg_error = mysqli_error($conexao);
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto $produto->no_produto não foi alterado. Erro: ".$msg_error;
}

header('location: produto-lista.php');
die();
<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 27/10/2016
 * Time: 20:29
 */

session_start();

include("banco-produto.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];

if(array_key_exists('usado', $_POST)):
    $usado = "true";
else:
    $usado = "false";
endif;

$result = alteraProduto($id, $nome, $preco, $usado, $descricao, $categoria);

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto ".$nome." foi alterado.";

}else{ $msg_error = mysqli_error($conexao);
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto $nome não foi alterado. Erro: ".$msg_error;
}

header('location: produto-lista.php');
die();
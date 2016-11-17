<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:14
 */

include('logica-usuario.php');
include('banco-produto.php');

verificaUsuario();

$nome = $_POST['nome'];
$preco = $_POST['preco'];

if(array_key_exists('usado',$_POST)):
    $usado = "true";
else:
    $usado = "false";
endif;

$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];

$resultCadastro = insereProduto($nome, $preco, $usado, $categoria, $descricao);

if($resultCadastro == true){
    $_SESSION['acao'] = "Sucesso!";
    $_SESSION['resultado'] = "O produto foi cadastrado.";
    header('location: produto-lista.php');
}else{ $msg_error = mysqli_error($conexao);
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O produto não foi cadastrado.";
    header('location: produto-lista.php');
}




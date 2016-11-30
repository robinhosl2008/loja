<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:14
 */

require_once('cabecalho.php');
require_once('logica-usuario.php');

verificaUsuario();

try {
    $categoria = new Categoria();
    $categoria->setId($_POST['categoria']);

    $no_produto = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    if (array_key_exists('usado', $_POST)):
        $usado = 1;
    else:
        $usado = 0;
    endif;

    $produto = new Produto($no_produto, $preco, $usado, $categoria, $descricao);

    $produtoDAO = new ProdutoDAO(getConnection());
    $resultCadastro = $produtoDAO->insereProduto($produto);

    if ($resultCadastro == true) {
        $_SESSION['acao'] = "Sucesso!";
        $_SESSION['resultado'] = "O produto " . $produto->getNoProduto() . " foi cadastrado.";
        header('location: produto-lista.php');
    } else {
        $_SESSION['acao'] = "Atenção!";
        $_SESSION['resultado'] = "O produto " . $produto->getNoProduto() . " não foi cadastrado.";
        header('location: produto-lista.php');
    }
}catch (ErrorException $e){
    echo $e;
}



<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 22:50
 */

require_once('conexao.php');

function insereProduto($nome, $preco, $usado, $categoria, $descricao){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oNome = mysqli_real_escape_string($conexao, $nome);
    $oDescricao = mysqli_real_escape_string($conexao, $descricao);

    // Atribui a query SQL à variável.
    $query = "insert into produto (no_produto, preco, usado, id_categoria, descricao) values ('{$oNome}',{$preco},{$usado},{$categoria},'{$oDescricao}')";

    // O resultado da busca é atribuido a uma variável.
    $result = mysqli_query($conexao, $query);

    // Retorna o resultado em forma de array.
    return $result;
}

function listaProdutos(){
    // Pega a conexão.
    $conexao = getConnection();

    // Cria uma variável que será um array de produtos.
    $produtos = array();

    // Atribui a query SQL à variável.
    $query = "SELECT p.*, c.no_categoria FROM produto p INNER JOIN categoria c ON p.id_categoria = c.id";

    // O resultado da query é atribuido para uma variável.
    $resultado = mysqli_query($conexao, $query);

    // É executada uma estrutura de repetição para pegar todas as categorias
    // e atribuir uma a uma ao array de categorias.
    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $produto);
    }

    // Retorna o array de produtos.
    return $produtos;
}

function alteraProduto($id, $nome, $preco, $usado, $descricao, $categoria){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oNome = mysqli_real_escape_string($conexao, $nome);
    $oDescricao = mysqli_real_escape_string($conexao, $descricao);

    // Atribui a query SQL à variável.
    $query = "UPDATE produto
      SET no_produto = '{$oNome}',
          preco = {$preco},
          usado = {$usado},
          id_categoria = {$categoria},
          descricao = '{$oDescricao}'
      WHERE id = {$id}";

    // Retorna o resultado da alteração.
    return mysqli_query($conexao, $query);
}

function removeProduto($id){
    // Pega a conexão.
    $conexao = getConnection();

    // Atribui a query SQL à variável.
    $query = "DELETE produto FROM loja.produto WHERE id = ".$id;

    // Retorna o resultado da exclusão.
    return mysqli_query($conexao, $query);
}

function buscaProduto($id){
    // Pega a conexão.
    $conexao = getConnection();

    // Atribui a query SQL à variável.
    $query = "select p.* from produto p where p.id = $id";

    // O resultado da query é atribuido para uma variável.
    $result = mysqli_query($conexao, $query);

    // É atribuida a variável a primera linha do resultado.
    $produto = mysqli_fetch_assoc($result);

    // Retorna o produto buscado.
    return $produto;
}
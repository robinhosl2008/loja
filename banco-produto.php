<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 22:50
 */

include('conexao.php');

function insereProduto($nome, $preco, $usado, $categoria, $descricao){
    $conexao = getConnection();
    $query = "insert into produto (no_produto, preco, usado, id_categoria, descricao) values ('{$nome}',{$preco},{$usado},{$categoria},'{$descricao}')";
    $result = mysqli_query($conexao, $query);
    return $result;
}

function listaProdutos(){
    $produtos = array();
    $query = "SELECT p.*, c.no_categoria FROM produto p INNER JOIN categoria c ON p.id_categoria = c.id";
    $conexao = getConnection();
    $resultado = mysqli_query($conexao, $query);

    while($produto = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $produto);
    }

    return $produtos;
}

function alteraProduto($id, $nome, $preco, $usado, $descricao, $categoria){
    $query = "UPDATE produto
      SET no_produto = '{$nome}',
          preco = {$preco},
          usado = {$usado},
          id_categoria = {$categoria},
          descricao = '{$descricao}'
      WHERE id = {$id}";
    $conexao = getConnection();
    return mysqli_query($conexao, $query);
}

function removeProduto($id){
    $query = "DELETE produto FROM loja.produto WHERE id = ".$id;
    $conexao = getConnection();
    $result = mysqli_query($conexao, $query);
    return $result;
}

function buscaProduto($id){
    $conexao = getConnection();
    $query = "select p.* from produto p where p.id = $id";
    $result = mysqli_query($conexao, $query);
    $produto = mysqli_fetch_assoc($result);
    return $produto;
}
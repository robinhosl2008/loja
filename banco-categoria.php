<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 27/10/2016
 * Time: 12:56
 */

require_once('conexao.php');
require_once('class/Categoria.php');

function listaCategorias(){
    // Pega a conexão.
    $conexao = getConnection();

    // Cria uma variável que será um array de categorias.
    $categorias = array();

    // Atribui a query SQL à variável.
    $query = "select * from categoria order by no_categoria asc";

    // O resultado da query é atribuido para uma variável.
    $resultado = mysqli_query($conexao, $query);

    // É executada uma estrutura de repetição para pegar todas as categorias
    // e atribuir uma a uma ao array de categorias.
    while ($categoria_array = mysqli_fetch_assoc($resultado)) {
        $no_categoria = $categoria_array['no_categoria'];
        $categoria = new Categoria($no_categoria);
        $categoria->setId($categoria_array['id']);

        array_push($categorias, $categoria);
    }

    // Retorna o array de categorias.
    return $categorias;
}

function adicionaCategoria(Categoria $categoria){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oNoCategoria = mysqli_real_escape_string($conexao, $categoria->getNoCategoria());

    // Atribui a query SQL à variável.
    $query = "insert into categoria (no_categoria) values ('".$oNoCategoria."')";

    // É executada uma estrutura de decisão para retornar true
    // se o produto foi registrado no banco ou não.
    if(mysqli_query($conexao, $query)){
        return "true";
    }else{
        return "false";
    }
}

function editaCategoria(Categoria $categoria){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oNoCategoria = mysqli_real_escape_string($conexao, $categoria->getNoCategoria());

    // Atribui a query SQL à variável.
    $query = "update categoria set no_categoria = '".$oNoCategoria."' where id = ".$categoria->getId();

    // É executada uma estrutura de decisão para retornar true
    // se o produto foi alterado no banco ou não.
    if(mysqli_query($conexao, $query)){
        return "true";
    }else{
        return "false";
    }
}

function buscaCategoria($id){
    // Pega a conexão.
    $conexao = getConnection();

    // Atribui a query SQL à variável.
    $query = "select * from categoria where id = $id";

    // O resultado da busca é atribuido a uma variável.
    $result = mysqli_query($conexao, $query);

    // É atribuida a variável a primera linha do resultado.
    if($categoria_array = mysqli_fetch_assoc($result)) {
        $categoria = new Categoria();
        $categoria->setId($categoria_array['id']);
        $categoria->setNoCategoria($categoria_array['no_categoria']);
    }

    // Retorna o resultado em forma de array.
    return $categoria;
}

function removeCategoria($id){
    // Pega a conexão.
    $conexao = getConnection();

    // Atribui a query SQL à variável.
    $query = "DELETE categoria.* FROM categoria WHERE id = $id";

    // O resultado da busca é atribuido a uma variável
    $result = mysqli_query($conexao, $query);

    // Retorna true caso a exclusão tenha sido efetivada ou false se ocorreu o contrário.
    return $result;
}





















<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 27/10/2016
 * Time: 12:56
 */

include_once('conexao.php');

function listaCategorias(){
    $conexao = getConnection();
    $categorias = array();
    $query = "select * from categoria order by no_categoria asc";
    $resultado = mysqli_query($conexao, $query);

    while ($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }

    return $categorias;
}

function adicionaCategoria($no_categoria){
    $conexao = getConnection();
    $query = "insert into categoria (no_categoria) values ('$no_categoria')";

    if(mysqli_query($conexao, $query)){
        return "true";
    }else{
        return "false";
    }
}

function editaCategoria($id, $no_categoria){
    $conexao = getConnection();
    $query = "update categoria set no_categoria='$no_categoria' where id = $id";

    if(mysqli_query($conexao, $query)){
        return "true";
    }else{
        return "false";
    }
}

function buscaCategoria($id){
    $conexao = getConnection();
    $query = "select * from categoria where id = $id";
    $result = mysqli_query($conexao, $query);
    $categoria = mysqli_fetch_assoc($result);

    return $categoria;
}

function removeCategoria($id){
    $conexao = getConnection();



    $query = "DELETE categoria.* FROM categoria WHERE id = $id";
    $result = mysqli_query($conexao, $query);
    return $result;
}





















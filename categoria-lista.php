<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 21:30
 */

include("banco-categoria.php");

function getCategorias(){
    $categorias = listaCategorias();

    return $categorias;
}

function getCategoria($id){
    $categoria = buscaCategoria($id);

    return $categoria;
}
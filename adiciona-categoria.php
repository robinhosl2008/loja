<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:14
 */

require_once('logica-usuario.php');
require_once('banco-categoria.php');
require_once('class/Categoria.php');

verificaUsuario();

if(isset($_POST['nome']) && $_POST['nome'] == "") {
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O nome da nova categoria não pode estar em branco.";
    header('location: categoria-formulario.php');
    die();
}

$categoria = new Categoria();

$categoria->setNoCategoria($_POST['nome']);

if(isset($_POST['id']) && $_POST['id'] != "") {
    $categoria->setId($_POST['id']);

    $result = editaCategoria($categoria);
}else{
    $result = adicionaCategoria($categoria);
}

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    if(isset($_POST['id']) && $_POST['id'] != ""){
        $_SESSION['resultado'] = "A categoria ".$categoria->getNoCategoria()." foi alterada.";
    }else {
        $_SESSION['resultado'] = "A categoria ".$categoria->getNoCategoria()." foi cadastrada.";
    }
    header('location: categoria-formulario.php');
}else{
    $_SESSION['acao'] = "Atenção!";
    if(isset($_POST['id']) && $_POST['id'] != ""){
        $_SESSION['resultado'] = "A categoria ".$categoria->getNoCategoria()." nao foi alterada.";
    }else {
        $_SESSION['resultado'] = "A categoria ".$categoria->getNoCategoria()." nao foi cadastrada.";
    }
    header('location: categoria-formulario.php');
}

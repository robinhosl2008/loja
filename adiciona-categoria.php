<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:14
 */

include('logica-usuario.php');
include('banco-categoria.php');

verificaUsuario();

if(isset($_POST['nome']) && $_POST['nome'] == "") {
    $_SESSION['acao'] = "Atenção!";
    $_SESSION['resultado'] = "O nome da nova categoria não pode estar em branco.";
    header('location: categoria-formulario.php');
    die();
}

if(isset($_POST['id']) && $_POST['id'] != "") {
    $result = editaCategoria($_POST['id'], $_POST['nome']);
}else{
    $result = adicionaCategoria($_POST['nome']);
}

if($result == true){
    $_SESSION['acao'] = "Sucesso!";
    if(isset($_POST['id']) && $_POST['id'] != ""){
        $_SESSION['resultado'] = "A categoria foi alterada.";
    }else {
        $_SESSION['resultado'] = "A categoria foi cadastrada.";
    }
    header('location: categoria-formulario.php');
}else{ $msg_error = mysqli_error($conexao);
    $_SESSION['acao'] = "Atenção!";
    if(isset($_POST['id']) && $_POST['id'] != ""){
        $_SESSION['resultado'] = "A categoria nao foi alterada.";
    }else {
        $_SESSION['resultado'] = "A categoria nao foi cadastrada.";
    }
    header('location: categoria-formulario.php');
}

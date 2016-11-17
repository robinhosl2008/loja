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

$no_categoria = $_POST['nome'];

$result = adicionaCategoria($no_categoria);

if($result == true){
    header('location: categoria-formulario.php?acao=true');
}else{ $msg_error = mysqli_error($conexao);
    header('location: categoria-formulario.php?acao=false');
}

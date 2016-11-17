<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 28/10/2016
 * Time: 20:34
 */

include('conexao.php');
include('logica-usuario.php');

function buscaUsuario($email, $senha){
    $conexao = getConnection();
    $query = "select * from usuario where email = '$email'";
    $result = mysqli_query($conexao, $query);

    if($usuario = mysqli_fetch_assoc($result)){
        if(md5($senha) === $usuario['senha']){
            logaUsuario($email);
            return 1;
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}



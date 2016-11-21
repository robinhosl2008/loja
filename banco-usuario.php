<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 28/10/2016
 * Time: 20:34
 */

require_once('conexao.php');
require_once('logica-usuario.php');

function buscaUsuario($email, $senha){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oEmail = mysqli_real_escape_string($conexao, $email);

    // Atribui a query SQL à variável.
    $query = "select * from usuario where email = '$oEmail'";

    // O resultado da query é atribuido para uma variável.
    $result = mysqli_query($conexao, $query);

    // É executada uma estrutura de repetição para verificar se a query foi executada com sucesso.
    // Outra fou usada para comparar a senha enviada pelo usuário no momento do login
    // com a que está no banco de dados.
    if($usuario = mysqli_fetch_assoc($result)){
        if(md5($senha) == $usuario['senha']){
            logaUsuario($email);
            return 1;
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}



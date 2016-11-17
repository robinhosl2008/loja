<?php
session_start();

function verificaUsuario()
{
    if (!usuarioEstaLogado()) {
        header('location: index.php?321=159357');
        die();
    }
}
function usuarioEstaLogado(){
    return isset($_SESSION['usuario_logado']);
}

function usuarioLogado(){
    return $_SESSION['usuario_logado'];
}

function logaUsuario($email){
    $_SESSION['usuario_logado'] = $email;
    $_SESSION['login'] = "Usuário ".$_SESSION['usuario_logado']." logado com sucesso!";
}

function logout(){
    session_destroy();
    session_start();
}
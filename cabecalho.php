<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:37
 */

require_once("class/Categoria.php");
require_once("class/Produto.php");
require_once("class/ProdutoDAO.php");
require_once("conexao.php");

verificaUsuario();

/*
// função autoload que carrega as classes.
function carregaClasse($nomeDaClasse) {
    require_once("class/".$nomeDaClasse.".php");
}

// registro da função de autoload.
spl_autoload_register("carregaClasse");
*/

//spl_autoload_register(function($class) {
  //  require_once "class/".$class.".php";
    //require_once "conexao.php";
//});

error_reporting(E_ALL ^ E_NOTICE)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">

    <script src="js/jquery-2.1.4.min.js" type="text/javascript" ></script>
    <script src="js/bootstrap.min.js" type="text/javascript" ></script>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/loja.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Minha Loja</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php session_start(); if(isset($_SESSION['usuario_logado'])): ?>
                        <li><a href="produto-lista.php">Produtos</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="produto-formulario.php">Produtos</a></li>
                                <li><a href="categoria-formulario.php">Categorias</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="relatorio-hd.php">Uso do Disco Rígido</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="contato.php">Contato</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php session_start(); if(isset($_SESSION['usuario_logado'])): ?>
                        <li><a href="#"><?php echo $_SESSION['usuario_logado'] ?> <span class="glyphicon glyphicon-cog"></span></span></a></li>
                        <li><a href="logout.php">Sair</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="principal">
















<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 20:22
 */
session_start();
if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
}
?>

<?php include('cabecalho.php'); ?>

<h1>Página onde é feita uma breve descrição do sistema.</h1>

<?php include('rodape.php'); ?>
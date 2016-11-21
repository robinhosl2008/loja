<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 20:24
 */
session_start();
//if(!isset($_SESSION['usuario_logado'])){
    //header('location: index.php');
//}
?>

<?php require_once('cabecalho.php'); ?>

<div class="formulario">
    <form method="post" action="envia-contato.php">
        <div class="form-group">
            <label for="nome">None:</label>
            <input class="form-control" type="text" name="nome" id="nome" />
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input class="form-control" type="email" name="email" id="email" />
        </div>
        <div class="form-group">
            <label for="assunto">Assunto:</label>
            <input class="form-control" type="text" name="assunto" id="assunto" />
        </div>
        <div class="form-group">
            <label for="msg">Mensagem:</label>
            <textarea class="form-control" name="msg" id="msg" ></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Enviar" />
        </div>
    </form>
</div>

<?php require_once('rodape.php'); ?>
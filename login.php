<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 05/11/2016
 * Time: 09:20
 */

include('banco-usuario.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$result = buscaUsuario($email, $senha);


header("location: index.php?login=$result");

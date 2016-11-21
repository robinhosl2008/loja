<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 21/11/16
 * Time: 15:16
 */

$nome = $_POST['nome'];
$email = $_POST['email'];
$msg = $_POST['msg'];

mail('robinhosl2008@gmail.com', 'oi', 'teste para saber se esta indo email.');
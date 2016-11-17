<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 27/10/2016
 * Time: 12:57
 */

function getConnection(){
    return mysqli_connect('localhost', 'root', 'root', 'loja');
}

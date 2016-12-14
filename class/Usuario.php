<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 14/12/16
 * Time: 21:15
 */

class Usuario {

    private $id;
    private $email;
    private $senha;

    function __construct($id, $email, $senha){
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * @param $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param $email
     */
    public function setEmail($email){
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param $senha
     */
    public function setSenha($senha){
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getSenha(){
        return $this->senha;
    }
}






















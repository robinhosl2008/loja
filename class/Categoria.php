<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 22/11/16
 * Time: 11:54
 */

class Categoria {

    private $id;
    private $no_categoria;

    function __construct($no_categoria = null) {
        $this->no_categoria = $no_categoria;
    }

    /**
     * @param $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $noCategoria
     */
    public function setNoCategoria($noCategoria) {
        $this->no_categoria = $noCategoria;
    }

    /**
     * @return mixed
     */
    public function getNoCategoria() {
        return $this->no_categoria;
    }
}
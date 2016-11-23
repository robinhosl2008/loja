<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 22/11/16
 * Time: 10:21
 */

class Produto {

    private $id;
    private $no_produto;
    private $preco;
    private $usado;
    private $categoria;
    private $descricao;

    /**
     * @param float $valor
     * @return mixed
     */
    public function precoComDesconto($valor = 0.1) {
        if($valor > 0 && $valor <= 0.5) {
            return $this->preco - $this->preco * $valor;
        }
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
     * @param $noProduto
     */
    public function setNoProduto($noProduto) {
        $this->no_produto = $noProduto;
    }

    /**
     * @return mixed
     */
    public function getNoProduto() {
        return $this->no_produto;
    }

    /**
     * @param $preco
     */
    public function setPreco($preco) {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getPreco() {
        return $this->preco;
    }

    /**
     * @param $usado
     */
    public function setUsado($usado) {
        $this->usado = $usado;
    }

    /**
     * @return mixed
     */
    public function getUsado() {
        return $this->usado;
    }

    /**
     * @param $categoria
     */
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getCategoria() {
        return $this->categoria;
    }

    /**
     * @param $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDescricao() {
        return $this->descricao;
    }
}
























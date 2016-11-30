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

    // Função que inicia a classe ao ser instanciada.
    function __construct($no_produto, $preco, $usado, Categoria $categoria, $descricao) {
        $this->no_produto = $no_produto;
        $this->preco      = $preco;
        $this->usado      = $usado;
        $this->categoria  = $categoria;
        $this->descricao  = $descricao;
    }

    // Após utilizar o objeto ele é retirado da memória.
    //function __destruct() {

    //}

    // Função caso quisermos imprimir o objeto como uma string.
    //function __toString() {
        //return $this->no_produto.": R$".$this->preco;
    //}

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
        if($preco > 0) {
            $this->preco = $preco;
        }
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

    /**
     * @param float $valor
     * @return mixed
     */
    public function precoComDesconto($valor = 0.1) {
        if($valor > 0 && $valor <= 0.5) {
            return $this->preco - $this->preco * $valor;
        }
    }
}
























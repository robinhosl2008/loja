<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 22:50
 */

require_once('conexao.php');

function insereProduto(Produto $produto){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oNome = mysqli_real_escape_string($conexao, $produto->getNoProduto());
    $oDescricao = mysqli_real_escape_string($conexao, $produto->getDescricao());

    // Atribui a query SQL à variável.
    $query = "insert into produto (no_produto, preco, usado, id_categoria, descricao)
        values ('".$oNome."', ".$produto->getPreco().", ".$produto->getUsado().", ".$produto->getCategoria()->getId()." ,'".$oDescricao."')";

    // O resultado da busca é atribuido a uma variável.
    $result = mysqli_query($conexao, $query);

    // Fecha a conexão com o banco de dados.
    mysqli_close($conexao);

    // Retorna o resultado em forma de array.
    return $result;
}

function listaProdutos(){
    // Pega a conexão.
    $conexao = getConnection();

    // Cria uma variável que será um array de produtos.
    $produtos = array();

    // Atribui a query SQL à variável.
    $query1 = "SELECT p.*, c.no_categoria FROM produto p INNER JOIN categoria c ON p.id_categoria = c.id";

    // O resultado da query é atribuido para uma variável.
    $resultado1 = mysqli_query($conexao, $query1);

    // É executada uma estrutura de repetição para pegar todas as categorias
    // e atribuir uma a uma ao array de categorias.
    while($produto_array = mysqli_fetch_assoc($resultado1)){

        $id = $produto_array['id'];
        $no_produto = $produto_array['no_produto'];
        $preco = $produto_array['preco'];
        $descricao = $produto_array['descricao'];
        $usado = $produto_array['usado'];

        $categoria = new Categoria();
        $categoria->setId($produto_array['id']);
        $categoria->setNoCategoria($produto_array['no_categoria']);

        // Instancia os objetos e seta seus atributos.
        $produto = new Produto($no_produto, $preco, $usado, $categoria, $descricao);
        $produto->setId($id);

        array_push($produtos, $produto);
    }

    // Retorna o array de produtos.
    return $produtos;
}

function alteraProduto(Produto $produto){
    // Pega a conexão.
    $conexao = getConnection();

    // Essa função é usada para evitar que caracteres especiais interfiram na execução da query.
    $oNome = mysqli_real_escape_string($conexao, $produto->getNoProduto());
    $oDescricao = mysqli_real_escape_string($conexao, $produto->getDescricao());

    // Atribui a query SQL à variável.
    $query = "UPDATE produto
      SET no_produto = '".$oNome."',
          preco = ".$produto->getPreco().",
          usado = ".$produto->getUsado().",
          id_categoria = ".$produto->getCategoria()->getId().",
          descricao = '".$oDescricao."'
      WHERE id = ".$produto->getId();

    // Retorna o resultado da alteração.
    return mysqli_query($conexao, $query);
}

function removeProduto($id){
    // Pega a conexão.
    $conexao = getConnection();

    // Atribui a query SQL à variável.
    $query = "DELETE produto FROM loja.produto WHERE id = ".$id;

    // Retorna o resultado da exclusão.
    return mysqli_query($conexao, $query);
}

function buscaProduto($id){
    // Pega a conexão.
    $conexao = getConnection();

    // Atribui a query SQL à variável.
    $query = "select p.* from produto p where p.id = $id";

    // O resultado da query é atribuido para uma variável.
    $result = mysqli_query($conexao, $query);

    // É atribuida a variável a primera linha do resultado.
    $produto_array = mysqli_fetch_assoc($result);

    $no_produto = $produto_array['no_produto'];
    $preco = $produto_array['preco'];
    $descricao = $produto_array['descricao'];
    $usado = $produto_array['usado'];

    $categoria = new Categoria();
    $categoria->setId($produto_array['id_categoria']);

    $produto = new Produto($no_produto, $preco, $usado, $categoria, $descricao);
    $produto->setId($produto_array['id']);

    // Retorna o produto buscado.
    return $produto;
}
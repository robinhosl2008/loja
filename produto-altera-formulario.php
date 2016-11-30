<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 27/10/2016
 * Time: 19:28
 */

session_start();

if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
}

require_once("cabecalho.php");

$id = $_POST['id'];
$produtoDAO = new ProdutoDAO(getConnection());
$produto = $produtoDAO->buscaProduto($id);
?>


    <h1>Editar Produto</h1>

<div class="formulario">
    <form action="altera-produto.php" method="post">

        <input type="hidden" name="id" id="id" value="<?php echo $produto->getId(); ?>"/>

        <div class="form-group">
            <label for="nome">Produto</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $produto->getNoProduto(); ?>"/>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input class="form-control" type="text" name="preco" id="preco" value="<?php echo $produto->getPreco(); ?>"/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao"> <?php echo $produto->getDescricao(); ?></textarea>
        </div>

        <div class="form-group">
            <label for="usado">Usado:</label>
            <input type="checkbox" name="usado" id="usado" value="true"
                <?php if($produto->getUsado() == true): ?>
                    checked
                <?php endif; ?>
                />
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
                <option value="">Selecione...</option>
                <?php $categorias = listaCategorias();
                foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria->getId(); ?>"
                    <?php if($produto->getCategoria()->getId() == $categoria->getId()): ?>
                        selected
                    <?php endif ?>><?php echo $categoria->getNoCategoria(); ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <input class="btn btn-sm btn-primary" type="submit" value="Enviar"/>
            <input class="btn btn-sm btn-default" type="button" value="Voltar" onclick="javascript:history.back()"/>
        </div>

    </form>
</div>

<?php require_once("rodape.php"); ?>
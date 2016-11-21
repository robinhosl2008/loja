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
require_once("banco-produto.php");

$id = $_POST['id'];
$produto = buscaProduto($id);


?>


    <h1>Editar Produto</h1>

<div class="formulario">
    <form action="altera-produto.php" method="post">

        <input type="hidden" name="id" id="id" value="<?php echo $produto['id']; ?>"/>

        <div class="form-group">
            <label for="nome">Produto</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?php echo $produto['no_produto']; ?>"/>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input class="form-control" type="text" name="preco" id="preco" value="<?php echo $produto['preco']; ?>"/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao"> <?php echo $produto['descricao']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="usado">Usado:</label>
            <input type="checkbox" name="usado" id="usado" value="true"
                <?php if($produto['usado'] == true): ?>
                    checked
                <?php endif; ?>
                />
        </div>

        <?php require_once("banco-categoria.php"); ?>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
                <option value="">Selecione...</option>
                <?php $categorias = listaCategorias();
                foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id']; ?>"
                    <?php if($produto['id_categoria'] == $categoria['id']): ?>
                        selected
                    <?php endif;?>><?php echo $categoria['no_categoria']; ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <input class="btn btn-sm btn-primary" type="submit" value="Enviar"/>
        </div>

    </form>
</div>

<?php require_once("rodape.php"); ?>
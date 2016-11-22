<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 11:24
 */
?>

<?php
require_once("cabecalho.php");
require_once("banco-categoria.php");

if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
} ?>

    <h1>Formulário de cadastro</h1>

<div class="formulario">
    <form action="adiciona-produto.php" method="post">

        <div class="form-group">
            <label for="nome">Produto</label>
            <input class="form-control" type="text" name="nome" id="nome"/>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input class="form-control" type="text" name="preco" id="preco"/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao"></textarea>
        </div>

        <div class="form-group">
            <label for="usado">Usado:</label>
            <input class="" type="checkbox" name="usado" id="usado" value="true" />
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
                <option value="">Selecione...</option>
                <?php $categorias = listaCategorias();
                    foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['no_categoria']; ?></option>
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
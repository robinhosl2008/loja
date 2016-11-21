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
    require_once("categoria-lista.php");
?>

<?php if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
} ?>

    <h1>Novo Cadastro</h1>

<div class="formulario">
    <form action="adiciona-categoria.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php
            if(isset($_POST['id'])){
                echo $_POST['id'];
            }
        ?>" />

        <div class="form-group">
            <label for="nome">Categoria</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?php
                    if(isset($_POST['id'])){
                        $cat = getCategoria($_POST['id']);
                        echo $cat['no_categoria'];
                    }
                ?>" />
        </div>

        <div class="form-group">
            <input class="btn btn-sm btn-primary" type="submit" value="Enviar"/>
        </div>

    </form>
</div>

    <h1>Lista de Categorias</h1>


<?php if(isset($_SESSION['acao']) && $_SESSION['acao'] == "Sucesso!") { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <strong><?php echo $_SESSION['acao']; ?></strong> <?php echo $_SESSION['resultado'] ?>.
    </div>
    <?php unset($_SESSION['acao'], $_SESSION['resultado']); } ?>

<?php if(isset($_SESSION['acao']) && $_SESSION['acao'] == "Atenção!") { ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <strong><?php echo $_SESSION['acao']; ?></strong> <?php echo $_SESSION['resultado'] ?>.
    </div>
    <?php unset($_SESSION['acao'], $_SESSION['resultado']); } ?>


    <table class="table table-bordered table-responsive table-hover table-condensed">
        <thead>
        <tr>
            <td><label>NOME</label></td>
            <td class="acao"><label>AÇÕES</label></td>
        </tr>
        </thead>
        <tbody>
        <?php
        $categorias = getCategorias();
        foreach($categorias as $categoria) : ?>
            <tr>
                <td align="left"><?php echo $categoria['no_categoria']; ?></td>
                <td>
                    <div style="position: relative; float: left">
                        <form method="post" action="categoria-formulario.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $categoria['id']; ?>">
                            <button class="text-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                        </form>
                    </div>
                    <div style="position: relative; float: right">
                        <form method="post" action="remove-categoria.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $categoria['id']; ?>">
                            <button class="text-danger"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

<?php require_once("rodape.php"); ?>
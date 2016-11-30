<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 21:30
 */

require_once('cabecalho.php');

if(!isset($_SESSION['usuario_logado'])){
    header('location: index.php');
} ?>

    <h1>Lista de Produtos</h1>

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

    <?php include('banco-produto.php'); ?>

    <table class="table table-bordered table-responsive table-hover">
        <thead>
            <tr>
                <td><label>NOME</label></td>
                <td><label>PREÇO</label></td>
                <td><label>-10%</label></td>
                <td><label>ESTADO</label></td>
                <td><label>CATEGORIA</label></td>
                <td><label>DESCRIÇÃO</label></td>
                <td class="acao"><label>AÇÕES</label></td>
            </tr>
        </thead>
        <tbody>
        <?php
        $produtoDAO = new ProdutoDAO(getConnection());
        $produtos = $produtoDAO->listaProdutos();
        foreach($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto->getNoProduto(); ?></td>
                <td>R$<?php echo $produto->getPreco(); ?></td>
                <td>R$<?php echo $produto->precoComDesconto(); ?></td>
                <td>
                    <?php
                        if($produto->getUsado() == true):
                            echo "Usado";
                        else:
                            echo "Novo";
                        endif;
                    ?>
                </td>
                <td><?php echo $produto->getCategoria()->getNoCategoria(); ?></td>
                <td><?php echo substr($produto->getDescricao(), 0, 30); ?></td>
                <td>
                    <div style="position: relative; float: left">
                        <form method="post" action="produto-altera-formulario.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $produto->getId(); ?>">
                            <button class="text-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                        </form>
                    </div>
                    <div style="position: relative; float: right">
                        <form method="post" action="remove-produto.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $produto->getId(); ?>">
                            <button class="text-danger"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>



<?php require_once('rodape.php'); ?>
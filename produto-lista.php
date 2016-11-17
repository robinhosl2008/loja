<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 21:30
 */
?>

<?php include('cabecalho.php');

 ?>

    <h1>Lista de Produtos</h1>

<style>

</style>


    <?php
        if(array_key_exists('acao', $_GET)) {
            $acao = $_GET['acao'];
            if ($acao == "false") { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Atenção!</strong> Procedimento não realizado.
                </div>
            <?php } else { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>Sucesso!</strong> Procedimento realizado.
                </div>
            <?php }
        }

    include('banco-produto.php');
?>

    <table class="table table-bordered table-responsive table-hover">
        <thead>
            <tr>
                <td><label>NOME</label></td>
                <td><label>PREÇO</label></td>
                <td><label>ESTADO</label></td>
                <td><label>CATEGORIA</label></td>
                <td><label>DESCRIÇÃO</label></td>
                <td class="acao"><label>AÇÕES</label></td>
            </tr>
        </thead>
        <tbody>
        <?php
        $produtos = listaProdutos();
        foreach($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto['no_produto']; ?></td>
                <td>R$<?php echo $produto['preco']; ?></td>
                <td>
                    <?php
                        if($produto['usado'] == true):
                            echo "Usado";
                        else:
                            echo "Novo";
                        endif;
                    ?>
                </td>
                <td><?php echo $produto['no_categoria']; ?></td>
                <td><?php echo substr($produto['descricao'], 0, 30); ?></td>
                <td>
                    <div style="position: relative; float: left">
                        <form method="post" action="produto-altera-formulario.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $produto['id']; ?>">
                            <button class="text-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                        </form>
                    </div>
                    <div style="position: relative; float: right">
                        <form method="post" action="remove-produto.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $produto['id']; ?>">
                            <button class="text-danger"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>



<?php include('rodape.php'); ?>
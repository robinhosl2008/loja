<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 10:57
 */

require_once("cabecalho.php");
?>

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

    <h1>Bem vindo</h1>

<?php if(isset($_SESSION['usuario_logado'])){ ?>
    <p class="alert">Usuário <?php echo $_SESSION['usuario_logado']; ?> logado</p>
<?php }else{?>
    <div align="center">
        <h2>Login</h2>
        <div style="width: 200px">
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input class="form-control" type="email" name="email" id="email" />
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input class="form-control" type="password" name="senha" id="senha" />
                </div>
                <div class="form-group">
                    <input class="btn btn-primary btn-sm" type="submit" value="Entrar" />
                </div>
            </form>
        </div>
    </div>
    <div align="center">
        Quero me <a href="#">cadastrar</a>!
    </div>
<?php } ?>


<?php
require_once("rodape.php"); ?>
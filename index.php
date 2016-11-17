<?php
/**
 * Created by PhpStorm.
 * User: Robson
 * Date: 24/10/2016
 * Time: 10:57
 */

    include("cabecalho.php");
?>

<?php if(isset($_SESSION['login'])){ ?>
    <p class="alert alert-success"><?php echo $_SESSION['login'] ?></p>
<?php unset($_SESSION['login']); } ?>

<?php if(isset($_SESSION['logout'])){ ?>
    <p class="alert alert-success"><?php echo $_SESSION['logout']; ?></p>
<?php session_destroy(); } ?>

<?php if(isset($_SESSION['usuario_nao_encontrado'])){ ?>
    <p class="alert alert-warning">Usuário ou senha incorretos!</p>
<?php } ?>

<?php if(isset($_GET['321']) && $_GET['321'] == 159357){ ?>
    <p class="alert alert-danger">Entre no sistema para ver esta página!</p>
<?php } ?>

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
<?php } ?>


<?php
include("rodape.php"); ?>
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

<?php if(isset($_SESSION['usuario_logado'])){ ?>
    <p class="alert">Usuário <?php echo $_SESSION['usuario_logado']; ?> logado</p>
<?php }else{?>
    <div align="center" class="panel panel-default">
        <div class="panel-body">
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

                <div align="center">
                    Quero me <a href="#" style="text-decoration: none" data-toggle="modal" data-target="#myModal">cadastrar</a>!
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Formulário de Cadastro</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <form id="formCadUsuario" method="post" action="" class="form-inline form-group">
                                <div class="col-sm-12 col-lg-12" style="text-align: left; padding-top: 15px">
                                    <div class="col-sm-2 col-lg-2"></div>
                                    <label class="col-sm-4 col-lg-4" for="login">E-mail: </label>
                                    <input class="form-control col-sm-6 col-lg-6" type="email" name="login" id="login" />
                                </div>
                                <div class="col-sm-12 col-lg-12" style="text-align: left; padding-top: 15px">
                                    <div class="col-sm-2 col-lg-2"></div>
                                    <label class="col-sm-4 col-lg-4" for="senha">Senha: </label>
                                    <input class="form-control col-sm-6 col-lg-6" type="password" name="senha" id="senha" />
                                </div>
                                <div class="col-sm-12 col-lg-12" style="text-align: left; padding-top: 15px">
                                    <div class="col-sm-2 col-lg-2"></div>
                                    <label class="col-sm-4 col-lg-4" for="confSenha">Confirmar Senha: </label>
                                    <input class="form-control col-sm-6 col-lg-6" type="password" name="confSenha" id="confSenha" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCadastrar" onclick="cadastrarUsuario()" class="btn btn-primary">Cadastrar</button>
                    <button type="button" id="btnCancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php
require_once("rodape.php"); ?>
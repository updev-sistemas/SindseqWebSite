<?php
/**
 * Created by PhpStorm.
 * User: Antonio José
 * Date: 02/09/2016
 * Time: 16:36
 */


$query = 'SELECT * FROM usuarios WHERE codigo=? LIMIT 1';
$param = array($usuario->codigo);
$db->executar($query,$param);
$eu = $db->resultado(APP_RESULTADO_OBJETOS)[0];


?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Perfil do Usuário <small>(Suas atualização estaram disponíveis no próximo login)</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img id="minhaFoto" class="img-responsive avatar-view" src="../storage/perfil/<?=$eu->foto?>" alt="Avatar" title="Change the avatar">
                        </div>
                    </div>
                    <div>
                        <h3 class="text-center"><?=$eu->nome?></h3>
                    </div>
                    <div>
                        <input type="hidden" id="usuariocod" value="<?=$eu->codigo?>" />
                        <button type="button" id="btnRemoveFoto" class="btn btn-danger btn-block" title="Remover minha foto" admin="<?=$eu->codigo?>"><i class="fa fa-close"></i> Remover Foto</button>
                    </div>
                    <div class="divider"></div>
                    <div>
                        <h5 >Nova foto</h5>
                        <form action="#" class="form-horizontal" method="post" role="form">
                            <input type="file" id="novaFoto" name="novaFoto"  accept="image/*" class="form-control" />
                        </form>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                        <div class="col-md-6">
                            <h2>Alterar Dados</h2>
                        </div>
                    </div>

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="areaDadosPerfil" aria-labelledby="home-tab">
                                <br />
                                <div id="msgUpSucesso" class="oculto alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Sucesso!</strong> Dados atualizados.
                                </div>
                                <div id="msgUpError" class="oculto alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> Não foi possível atualizar os dados.
                                </div>
                                <div id="msgFotoSucesso" class="oculto alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Sucesso!</strong> Foto atualizada.
                                </div>
                                <div id="msgFotoError" class="oculto alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> Sua foto foi atualizada.
                                </div>
                                <br />
                                <form action="#" class="form-horizontal" method="post" role="form">
                                    <input type="hidden" id="meuid" name="id" value="<?=$eu->codigo?>" />
                                    <fieldset>
                                        <div>
                                            <label for="titulo">Nome *</label>
                                            <input type="text" id="nome" class="form-control" name="nome" value="<?=$eu->nome?>" placeholder="Digite seu nome" required />
                                            <p id="msgNomeVazio" class="oculto help-block"><i class="fa fa-warning"></i> Você deve digitar um nome</p>
                                            <br />
                                        </div>

                                        <div>
                                            <label for="titulo">Sobrenome *</label>
                                            <input type="text" id="sobrenome" class="form-control" name="sobrenome" value="<?=$eu->sobrenome?>" placeholder="Digite seu sobrenome" required />
                                            <p id="msgNomeVazio" class="oculto help-block"><i class="fa fa-warning"></i> Você deve digitar um sobrenome</p>
                                            <br />
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-block btn-success" id="btnAtualizar"><i class="fa fa-save"></i> <strong>Atualizar Dados</strong></button>
                                        </div>
                                    </fieldset>
                                </form>
                                <br />
                                <div id="areaSenha"></div>
                                <?php if($request->get('trocaSenha')=='sim') : ?>
                                <div id="msg" class="alert alert-warning alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Atenção!</strong> Atualize seus dados e troque sua senha.
                                </div>
                                <?php endif; ?>
                                <div class="divider"></div>
                                <h2>Trocar Senha</h2>
                                <form action="#" class="form-horizontal" method="post" role="form">
                                    <input type="hidden" id="meuid" name="id" value="<?=$eu->codigo?>" />
                                    <div>
                                        <label for="titulo">Senha Atual *</label>
                                        <input type="password" id="asenha" class="form-control" placeholder="Sua Senha Atual [Deixe em branco para não alterar]" required />
                                        <p id="msgSenhaAtualVazia" class="oculto help-block"><i class="fa fa-warning"></i> Digite sua senha atual</p>
                                        <br />
                                    </div>

                                    <div>
                                        <label for="titulo">Nova Senha *</label>
                                        <div class="input-group">
                                            <input type="password" id="nsenha" class="form-control" placeholder="Sua Nova Senha [Deixe em branco para não alterar]" required />
                                            <span class="input-group-btn">
                                                <button type="button" id="btnGerarSenha"  data-toggle="modal" data-target="#dialog"  class="btn btn-primary">Gerador de Senha</button>
                                            </span>
                                        </div>
                                        <p id="msgSenhaNovaVazia" class="oculto help-block"><i class="fa fa-warning"></i> Sua nova senha está vazia ou tem menos de 6 caracteres</p>
                                        <p id="msgSenhaRepeteVazia" class="oculto help-block"><i class="fa fa-warning"></i> A senha não confere ou está vazio</p>
                                    </div>

                                    <div>
                                        <label for="titulo">Repita a senha *</label>
                                        <input type="password" id="rsenha" class="form-control" placeholder="Repita Sua Nova Senha [Deixe em branco para não alterar]" required />
                                        <br />
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-block btn-success" id="btnAtualizarSenha"><i class="fa fa-save"></i> <strong>Atualizar Senha</strong></button>
                                    </div>
                                </form>

                                <div class="modal fade" id="dialog" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Gerar Senha</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="post" role="form" class="form-horizontal">
                                                    <div class="input-group">
                                                        <input type="text" id="senhaGerada"  placeholder="Clique -> "  class="form-control" />
                                                        <span class="input-group-btn">
                                                            <button type="button" id="btnRefreshNovaSenha" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnCancelar" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    <button type="button" id="btnNovo" class="btn btn-success">Usar esta senha</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


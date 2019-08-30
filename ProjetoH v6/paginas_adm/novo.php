<?php
require_once '../conexao/conexao.php';
include_once '../includes/header.php';
include_once '../includes/sidebar.php';
include_once '../includes/menu.php';

include_once '../classes/OrigemVO.php';
include_once '../classes/OrigemDAO.php';

$origemVO = new OrigemVO();
$origemDAO = new OrigemDAO();

$origem = $origemDAO->readAll($conexao);
?>
<!-- Inicio Conteúdo -->
<div class="content">
    <div class="row justify-content-md-center">

        <div class="col-md-10">
            <div class="card card-user">
                <div class="card-header">
                    <h4 class="card-title">Cadastrar novo Curriculo</h4>
                </div>
                <div class="card-body">
                    <form action="insere.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <h5>Dados Pessoais</h5>
                            </div>
                            <div class="col-md-9 col-sm-6 pr-1">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" placeholder="Nome" name="nome">
                                </div>
                            </div> 
                            <div class="col-md-3 col-sm-6 pl-1">
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="date" class="form-control" name="data_nasc">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3 col-sm-6 pr-1">
                                <div class="form-group">
                                    <label>Gênero</label>
                                    <select id="inputState" class="form-control" name="genero">
                                        <option selected>Escolha...</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 px-1">
                                <div class="form-group">
                                    <label>Estado Cívil</label>
                                    <select id="inputState" class="form-control" name="est_civil">
                                        <option selected>Escolha...</option>
                                        <option value="Solteiro">Solteiro (a)</option>
                                        <option value="Casado">Casado (a)</option>
                                        <option value="Divorciado">Divorciado (a)</option>
                                        <option value="Separado">Separado(a)</option>
                                        <option value="Viúvo">Viúvo (a)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 px-1">
                                <div class="form-group">
                                    <label>País de Origem</label>
                                    <select id="inputState" class="form-control" name="origem">
                                        <option selected>Escolha...</option>

                                        <?php
                                        foreach ($origem as $value) {
                                            $id_origem = $value->getId_origem();
                                            $pais_origem = $value->getPais();

                                            echo "<option value='$id_origem'>$pais_origem</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <div class="form-group">
                                    <label>Data de Entrada no Brasil</label>
                                    <input type="date" class="form-control" name="data_ent">
                                </div>
                            </div>
                        </div>

                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class=""><button type="button" id="btnAdd" class="btn btn-primary btn-block"><i class="nc-icon nc-simple-add"></i></button></p>
                                </div>
                            </div>
                            <div class="row group">
                                <div class="col-md-3 col-sm-12 pr-1">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Grau de Parentesco</label>
                                            <select id="inputState" class="form-control" name="parentesco[]">
                                                <option selected>Escolha...</option>
                                                <option value="Conjugue">Conjugue</option>
                                                <option value="Filho">Filho</option>
                                                <option value="Filha">Filha</option>
                                                <option value="Irmão">Irmão</option>
                                                <option value="Irmã">Irmã</option>
                                                <option value="Pai">Pai</option>
                                                <option value="Mãe">Mãe</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 px-1">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control" name="data_nasc_parente[]">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 px-1">
                                    <label>Mora Junto</label>
                                    <select id="inputState" class="form-control" name="mora_junto[]">
                                        <option selected>Escolha...</option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                    </select>
                                </div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btnRemove btn-block mt-4">Remover</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Informações de Contato</h5>
                            </div>
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-5 pl-1">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="tel" class="form-control" name="telefone">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="endereco">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="number" class="form-control" name="numero">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" class="form-control" name="bairro">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="number" class="form-control" name="cep">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" name="cidade">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Formação</h5>
                            </div>
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Escolaridade</label>
                                    <select id="inputState" class="form-control" name="escolaridade">
                                        <option selected>Escolha...</option>
                                        <option value="Fundamental">Ensino Fundamental</option>
                                        <option value="Médio">Ensino Médio</option>
                                        <option value="Técnico">Ensino Técnico</option>
                                        <option value="Superior">Ensino Superior</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 px-1">
                                <div class="form-group">
                                    <label>Ano de Graduação</label>
                                    <input type="number" class="form-control" name="graduacao">
                                </div>
                            </div>

                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Instituição</label>
                                    <input type="text" class="form-control" name="instituicao">
                                </div>
                            </div>
                            <div class="col-md-2 px-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" name="grad_cidade">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" name="grad_pais">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Profissão</label>
                                    <input type="text" class="form-control" name="profissao">
                                </div>
                            </div>
                            <div class="col-md-8 pl-1">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" name="prof_desc">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row p-2">
                            <div class="col-md-12 col-sm-6">
                                <h5>Idiomas</h5>
                            </div>
                            <div class="col-md-3 col-sm-6 pr-1">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="idioma[]" value="Português">
                                        <span class="form-check-sign">Português
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <select id="inputState" class="form-control" name="fluencia[]">
                                    <option selected>Fluência...</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Fluente">Fluente</option>
                                </select>   
                            </div>

                            <div class="col-md-3 col-sm-6 pr-1">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"  name="idioma[]" value="Inglês">
                                        <span class="form-check-sign">Inglês
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <select id="inputState" class="form-control" name="fluencia[]">
                                    <option selected>Fluência...</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Fluente">Fluente</option>
                                </select>   
                            </div>

                        </div>

                        <div class="row p-2">
                            <div class="col-md-3 col-sm-6 pr-1"> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="idioma[]" value="Crioulo">
                                        <span class="form-check-sign">Crioulo
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <select id="inputState" class="form-control" name="fluencia[]">
                                    <option selected>Fluência...</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Fluente">Fluente</option>
                                </select>   
                            </div>

                            <div class="col-md-3 col-sm-6 pr-1"> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="idioma[]" value="Francês">
                                        <span class="form-check-sign">Francês
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <select id="inputState" class="form-control" name="fluencia[]">
                                    <option selected>Fluência...</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Fluente">Fluente</option>
                                </select>   
                            </div>

                        </div>

                        <div class="row p-2">
                            <div class="col-md-3 col-sm-6 pr-1">

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="idioma[]" value="Espanhol">
                                        <span class="form-check-sign">Espanhol
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <select id="inputState" class="form-control" name="fluencia[]">
                                    <option selected>Fluência...</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Fluente">Fluente</option>
                                </select>   
                            </div>

                            <div class="col-md-3 col-sm-6 pr-1"> 
                                <div class="form-group">
                                    <input type="text" class="form-control" name="idioma[]" placeholder="Outro">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 pl-1">
                                <select id="inputState" class="form-control" name="fluencia[]">
                                    <option selected>Fluência...</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Fluente">Fluente</option>
                                </select>   
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Experiencia Profissional</h5>
                            </div>
                        </div>

                        <div class="form-content-exp">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class=""><button type="button" id="btnAddExp" class="btn btn-primary btn-block"><i class="nc-icon nc-simple-add"></i></button></p>
                                </div>
                            </div>
                            <div class="expConteudo">    
                                <div class="row group">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Empresa</label>
                                            <input type="text" class="form-control" name="empresa[]">
                                        </div>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <div class="form-group">
                                            <label>País</label>
                                            <input type="text" class="form-control" name="pais[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label>Data de Inicio</label>
                                            <input type="date" class="form-control" name="data_inicio[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>Data de Término</label>
                                            <input type="date" class="form-control" name="data_termino[]">
                                        </div>
                                    </div>
                                </div>

                                <div class="row group">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Cargo</label>
                                            <input type="text" class="form-control" name="cargo[]">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Funções</label>
                                            <input type="text" class="form-control" name="funcoes[]">
                                        </div>
                                    </div>
                                </div>

                                <div class="row group">
                                    <div class="col-md-8 pr-1">
                                        <div class="form-group">
                                            <label>Contato de Referência</label>
                                            <input type="text" class="form-control" name="nome_referencia[]">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="tel" class="form-control" name="telefone_referencia[]">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger btnRemoveExp btn-block mt-4">Remover</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim Conteúdo -->
<?php
include_once '../includes/footer.php';

<?php
include_once '../includes/header.php';
include_once '../includes/sidebar.php';
include_once '../includes/menu.php';

require_once '../conexao/conexao.php';
require_once '../classes/PessoaVO.php';
require_once '../classes/PessoaDAO.php';
include_once '../classes/ContatoVO.php';
include_once '../classes/ContatoDAO.php';
require_once '../classes/ExperienciaVO.php';
require_once '../classes/ExperienciaDAO.php';
include_once '../classes/FormacaoVO.php';
include_once '../classes/FormacaoDAO.php';
include_once '../classes/FamiliaVO.php';
include_once '../classes/FamiliaDAO.php';
include_once '../classes/IdiomaVO.php';
include_once '../classes/IdiomaDAO.php';
include_once '../classes/OrigemVO.php';
include_once '../classes/OrigemDAO.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$pessoaVO = new PessoaVO();
$pessoaDAO = new PessoaDAO();

$contatoVO = new ContatoVO();
$contatoDAO = new ContatoDAO();

$expVO = new ExperienciaVO();
$expDAO = new ExperienciaDAO();

$formVO = new FormacaoVO();
$formDAO = new FormacaoDAO();

$familiaVO = new FamiliaVO();
$familiaDAO = new FamiliaDAO();

$idiomaVO = new IdiomaVO();
$idiomaDAO = new IdiomaDAO();

$origemVO = new OrigemVO();
$origemDAO = new OrigemDAO();

$pessoaDados = $pessoaDAO->read($conexao, $id);

$nome = $pessoaDados->getNome();
$data_nasc = $pessoaDados->getData_nasc();
$genero = $pessoaDados->getSexo();
$data_entrada = $pessoaDados->getData_entrada_brasil();
$id_origem = $pessoaDados->getId_origem();
$estado_civil = $pessoaDados->getEstado_civil();
$id_contato = $pessoaDados->getId_contato();

$contatoDados = $contatoDAO->read($conexao, $id_contato);

$email = $contatoDados->getEmail();
$telefone = $contatoDados->getTelefone();
$rua = $contatoDados->getRua();
$numero = $contatoDados->getNumero();
$bairro = $contatoDados->getBairro();
$cep = $contatoDados->getCep();
$cidade = $contatoDados->getCidade();

$pessoaFormDados = $formDAO->read($conexao, $id);

$profissao = $pessoaFormDados->getProfissao();
$descr_profissao = $pessoaFormDados->getDescricao();
$escolaridade = $pessoaFormDados->getEscolaridade();
$grad_ano = $pessoaFormDados->getAno_formacao();
$instituicao = $pessoaFormDados->getInsituicao();
$grad_cidade = $pessoaFormDados->getCidade();
$grad_pais = $pessoaFormDados->getPais();

$origemDados = $origemDAO->read($conexao, $id_origem);
$pais_origem = $origemDados->getPais();
$id_pais_origem = $origemDados->getId_origem();
?>
<!-- Inicio Conteúdo -->
<div class="content">
    <div class="row justify-content-md-center">

        <div class="col-md-10">
            <div class="card card-user">
                <div class="card-header">
                    <h4 class="card-title">Curriculo</h4>
                </div>
                <div class="card-body">
                    <form action="atualiza.php" method="POST">
                        <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>"  hidden="">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Dados Pessoais</h5>
                            </div>
                            <div class="col-md-9 pr-1">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" value="<?php echo $nome; ?>" name="nome">
                                </div>
                            </div> 
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="date" class="form-control" value="<?php echo $data_nasc; ?>" name="data_nasc">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Gênero</label>
                                    <select id="inputState" class="form-control" name="genero">
                                        <option selected value="<?php echo $genero; ?>"><?php echo $genero; ?></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Estado Cívil</label>
                                    <select id="inputState" class="form-control" name="est_civil">
                                        <option selected value="<?php echo $estado_civil; ?>"><?php echo $estado_civil; ?></option>
                                        <option value="Solteiro">Solteiro (a)</option>
                                        <option value="Casado">Casado (a)</option>
                                        <option value="Divorciado">Divorciado (a)</option>
                                        <option value="Separado">Separado(a)</option>
                                        <option value="Viúvo">Viúvo (a)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>País de Origem</label>
                                    <select id="inputState" class="form-control" name="origem">
                                        <option selected value="<?php echo $id_pais_origem; ?>"><?php echo $pais_origem; ?></option>

                                        <?php
                                        $paises = $origemDAO->readAll($conexao);
                                        foreach ($paises as $value) {
                                            $id_origem = $value->getId_origem();
                                            $pais_origem = $value->getPais();

                                            echo "<option value='$id_origem'>$pais_origem</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Data de Entrada no Brasil</label>
                                    <input type="date" class="form-control" value="<?php echo $data_entrada; ?>" name="data_ent">
                                </div>
                            </div>
                        </div>

                        <div class="form-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class=""><button type="button" id="btnAdd" class="btn btn-primary btn-block"><i class="nc-icon nc-simple-add"></i></button></p>
                                </div>
                            </div>
                            <?php
                            $familiaDados = $familiaDAO->read($conexao, $id);

                            foreach ($familiaDados as $familiar):
                                $id_familiar = $familiar->getId_familia();
                                $parentesco = $familiar->getParentesco();
                                $data_nasc_familiar = $familiar->getData_nasc_familiar();
                                $mora_junto = $familiar->getMora_junto();
                                ?>

                                <div class="row group">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Grau de Parentesco</label>
                                            <input type="number" class="form-control" value="<?php echo $id_familiar; ?>" name="id_familiar[]" hidden="">
                                            <select id="inputState" class="form-control" name="parentesco[]">
                                                <option selected value="<?php echo $parentesco; ?>"><?php echo $parentesco; ?></option>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Data de Nascimento</label>
                                            <input type="date" class="form-control" value="<?php echo $data_nasc_familiar; ?>" name="data_nasc_familia[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Mora Junto?</label>
                                            <select id="inputState" class="form-control" name="mora_junto[]">
                                                <option selected value="<?php echo $mora_junto; ?>"><?php echo $mora_junto; ?></option>
                                                <option value="Sim">Sim</option>
                                                <option value="Não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btnRemove btn-block mt-4">Remover</button>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Informações de Contato</h5>
                            </div>
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
                                </div>
                            </div>
                            <div class="col-md-5 pl-1">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="number" class="form-control" value="<?php echo $telefone; ?>" name="telefone">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" value="<?php echo $rua; ?>" name="endereco">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="number" class="form-control" value="<?php echo $numero; ?>" name="numero">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" class="form-control" value="<?php echo $bairro; ?>" name="bairro">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="number" class="form-control" value="<?php echo $cep; ?>" name="cep">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" value="<?php echo $cidade; ?>" name="cidade">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Formação Acadêmica</h5>
                            </div>
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Escolaridade</label>
                                    <select id="inputState" class="form-control" name="escolaridade">
                                        <option selected value="<?php echo $escolaridade; ?>">Ensino <?php echo $escolaridade; ?></option>
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
                                    <input type="number" class="form-control" value="<?php echo $grad_ano; ?>" name="graduacao">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Instituição</label>
                                    <input type="text" class="form-control" value="<?php echo $instituicao; ?>" name="instituicao">
                                </div>
                            </div>
                            <div class="col-md-2 px-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" value="<?php echo $grad_cidade; ?>" name="grad_cidade">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" value="<?php echo $grad_pais ?>"  name="grad_pais">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Formação</label>
                                    <input type="text" class="form-control" value="<?php echo $profissao; ?>" name="profissao">
                                </div>
                            </div>
                            <div class="col-md-8 pl-1">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" value="<?php echo $descr_profissao; ?>" name="prof_desc">
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <h5>Idiomas</h5>
                            </div>
                        </div>
                        <?php
                        $idiomaDados = $idiomaDAO->read($conexao, $id);

                        foreach ($idiomaDados as $value):
                            $lingua = $value->getIdioma();
                            $fluencia = $value->getFluencia();

                            if ($lingua != "" || $fluencia != ""):
                                ?>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Idioma</label>
                                            <input type="text" class="form-control" value="<?php echo $lingua ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fluência</label>
                                            <input type="text" class="form-control" value="<?php echo $fluencia; ?>" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endforeach;
                        ?>

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
                            <?php
                            $pessoaExpDados = $expDAO->read($conexao, $id);
                            
                            foreach ($pessoaExpDados as $value):
                                $id_exp = $value->getId_experiencia();
                                $empresa = $value->getEmpresa();
                                $pais = $value->getPais();
                                $data_inicio = $value->getData_inicio();
                                $data_termino = $value->getData_termino();
                                $cargo = $value->getCargo();
                                $funcoes = $value->getFuncoes();
                                $contato_ref = $value->getNome_referencia();
                                $telefone_ref = $value->getTelefone_referencia();
                                ?>
                            <div class="expConteudo">    
                                <div class="row group">
                                    <div class="col-md-4 pr-1">
                                        <input type="number" name="id_exp" value="<?php echo $id_exp ?>" hidden="">
                                        <div class="form-group">
                                            <label>Empresa</label>
                                            <input type="text" class="form-control" name="empresa[]" value="<?php echo $empresa ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <div class="form-group">
                                            <label>País</label>
                                            <input type="text" class="form-control" name="pais[]" value="<?php echo $pais ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label>Data de Inicio</label>
                                            <input type="date" class="form-control" name="data_inicio[]" value="<?php echo $data_inicio ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-1">
                                        <div class="form-group">
                                            <label>Data de Término</label>
                                            <input type="date" class="form-control" name="data_termino[]" value="<?php echo $data_termino ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row group">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Cargo</label>
                                            <input type="text" class="form-control" name="cargo[]" value="<?php echo $cargo ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Funções</label>
                                            <input type="text" class="form-control" name="funcoes[]" value="<?php echo $funcoes ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row group">
                                    <div class="col-md-8 pr-1">
                                        <div class="form-group">
                                            <label>Contato de Referência</label>
                                            <input type="text" class="form-control" name="nome_referencia[]" value="<?php echo $contato_ref ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="tel" class="form-control" name="telefone_referencia[]" value="<?php echo $telefone_ref ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger btnRemoveExp btn-block mt-4">Remover</button>
                                    </div>
                                </div>
                                
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <hr>
                       
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">Atualizar</button>
                                <a href="javascript:history.back()" class="btn btn-default">Voltar</a>
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

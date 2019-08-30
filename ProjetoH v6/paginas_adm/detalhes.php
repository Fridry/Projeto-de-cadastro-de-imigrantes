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
$data_nasc = date("d-m-Y", strtotime($data_nasc));
$genero = $pessoaDados->getSexo();
$data_entrada = $pessoaDados->getData_entrada_brasil();
$data_entrada = date("d-m-Y", strtotime($data_entrada));
$origem = $pessoaDados->getId_origem();
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

$formDados = $formDAO->read($conexao, $id);

$profissao = $formDados->getProfissao();
$descr_profissao = $formDados->getDescricao();
$grad_ano = $formDados->getAno_formacao();
$escolaridade = $formDados->getEscolaridade();
$instituicao = $formDados->getInsituicao();
$grad_cidade = $formDados->getCidade();
$grad_pais = $formDados->getPais();

$origemDados = $origemDAO->read($conexao, $origem);
$pais_origem = $origemDados->getPais();
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
                    <form action="insere.php" method="POST">
                        <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly="readonly" hidden="">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Dados Pessoais</h5>
                            </div>
                            <div class="col-md-9 pr-1">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" value="<?php echo $nome; ?>" readonly="readonly">
                                </div>
                            </div> 
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="text" class="form-control" value="<?php echo $data_nasc; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label>Gênero</label>
                                    <input type="text" class="form-control" value="<?php echo $genero; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Estado Cívil</label>
                                    <input type="text" class="form-control" value="<?php echo $estado_civil; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>País de Origem</label>
                                    <input type="text" class="form-control" value="<?php echo $pais_origem; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label>Data de Entrada no Brasil</label>
                                    <input type="text" class="form-control" value="<?php echo $data_entrada; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        $familiaDados = $familiaDAO->read($conexao, $id);

                        foreach ($familiaDados as $familiar):
                            $parentesco = $familiar->getParentesco();
                            $data_nasc_familiar = $familiar->getData_nasc_familiar();
                            $data_nasc_familiar = date("d-m-Y", strtotime($data_nasc_familiar));
                            $mora_junto = $familiar->getMora_junto();
                            ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Grau de Parentesco</label>
                                        <input type="text" class="form-control" value="<?php echo $parentesco; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="text" class="form-control" value="<?php echo $data_nasc_familiar; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mora Junto?</label>
                                        <input type="text" class="form-control" value="<?php echo $mora_junto; ?>" readonly="readonly">
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Informações de Contato</h5>
                            </div>
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="<?php echo $email; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-5 pl-1">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" value="<?php echo $telefone; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" value="<?php echo $rua; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="text" class="form-control" value="<?php echo $numero; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" class="form-control" value="<?php echo $bairro; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="text" class="form-control" value="<?php echo $cep; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" value="<?php echo $cidade; ?>" readonly="readonly">
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
                                    <input type="text" class="form-control" value="Ensino <?php echo $escolaridade; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-2 px-1">
                                <div class="form-group">
                                    <label>Ano de Graduação</label>
                                    <input type="text" class="form-control" value="<?php echo $grad_ano; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Instituição</label>
                                    <input type="text" class="form-control" value="<?php echo $instituicao; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-2 px-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" value="<?php echo $grad_cidade; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" value="<?php echo $grad_pais ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Formação</label>
                                    <input type="text" class="form-control" value="<?php echo $profissao; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-8 pl-1">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" value="<?php echo $descr_profissao; ?>" readonly="readonly">
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
                            
                            if($lingua != "" || $fluencia != ""):
                            
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
                        endforeach; ?>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Experiencia Profissional</h5>
                            </div>
                        </div>
                        <?php
                        $pessoaExpDados = $expDAO->read($conexao, $id);

                        foreach ($pessoaExpDados as $value):
                            $empresa = $value->getEmpresa();
                            $data_inicio = $value->getData_inicio();
                            $data_inicio = date("d-m-Y", strtotime($data_inicio));
                            $data_termino = $value->getData_termino();
                            $data_termino = date("d-m-Y", strtotime($data_termino));
                            $cargo = $value->getCargo();
                            $funcoes = $value->getFuncoes();
                            $contato_ref = $value->getNome_referencia();
                            $telefone_ref = $value->getTelefone_referencia();
                            ?>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <input type="text" class="form-control" value="<?php echo $empresa; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-2 px-1">
                                    <div class="form-group">
                                        <label>País</label>
                                        <input type="text" class="form-control" value="<?php echo $empresa; ?>" name="pais[]">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Data de Inicio</label>
                                        <input type="text" class="form-control" value="<?php echo $data_inicio; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group">
                                        <label>Data de Término</label>
                                        <input type="text" class="form-control" value="<?php echo $data_termino; ?>" readonly="readonly">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control" value="<?php echo $cargo; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Funções</label>
                                        <input type="text" class="form-control" value="<?php echo $funcoes; ?>" readonly="readonly">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 pr-1">
                                    <div class="form-group">
                                        <label>Contato de Referência</label>
                                        <input type="text" class="form-control" value="<?php echo $contato_ref; ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="tel" class="form-control" value="<?php echo $telefone_ref; ?>" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>


                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <a href='edita.php?id=<?php echo$id; ?>' class='btn btn-success' role='button'>Editar</a>
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

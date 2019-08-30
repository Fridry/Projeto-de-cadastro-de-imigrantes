<?php
require_once '../conexao/conexao.php';
require_once './includes/header.php';
require_once './includes/navbar_1.php';
require_once '../classes/PessoaVO.php';
require_once '../classes/PessoaDAO.php';
include_once '../classes/ContatoVO.php';
include_once '../classes/ContatoDAO.php';
require_once '../classes/ExperienciaVO.php';
require_once '../classes/ExperienciaDAO.php';
include_once '../classes/FormacaoVO.php';
include_once '../classes/FormacaoDAO.php';
include_once '../classes/IdiomaVO.php';
include_once '../classes/IdiomaDAO.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$pessoaVO = new PessoaVO();
$pessoaDAO = new PessoaDAO();

$contatoVO = new ContatoVO();
$contatoDAO = new ContatoDAO();

$expVO = new ExperienciaVO();
$expDAO = new ExperienciaDAO();

$formVO = new FormacaoVO();
$formDAO = new FormacaoDAO();

$idiomaVO = new IdiomaVO();
$idiomaDAO = new IdiomaDAO();

$pessoaDados = $pessoaDAO->read($conexao, $id);

$nome = $pessoaDados->getNome();
$genero = $pessoaDados->getSexo();
$estado_civil = $pessoaDados->getEstado_civil();
$id_contato = $pessoaDados->getId_contato();

$contatoDados = $contatoDAO->read($conexao, $id_contato);

$email = $contatoDados->getEmail();
$telefone = $contatoDados->getTelefone();

$formDados = $formDAO->read($conexao, $id);

$profissao = $formDados->getProfissao();
$descr_profissao = $formDados->getDescricao();
$escolaridade = $formDados->getEscolaridade();
?>
<div class="container-fluid mt-5" style="color: #000;">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <h2 class="text-center">Detalhes</h2>
            <form action="insere.php" method="POST">
                <div class="row">
                    <h5>Nome: <?php echo $nome; ?></h5>
                </div>
                <div class="row">
                    <h5>Gênero: <?php echo $genero; ?></h5>
                </div>
                <div class="row">
                    <h5>Estado Cívil: <?php echo $estado_civil; ?></h5>
                </div>
                <div class="row">
                    <h5>E-mail: <?php echo $email; ?></h5>
                </div>
                <div class="row">
                    <h5>Telefone: <?php echo $telefone; ?></h5>
                </div>
                
                <hr>
                
                <div class="row">
                    <h5>Escolaridade: Ensino <?php echo $escolaridade; ?></h5>
                </div>
                <div class="row">
                    <h5>Profissão: <?php echo $profissao; ?></h5>
                </div>
                <div class="row">
                    <h5>Descrição: <?php echo $descr_profissao; ?></h5>
                </div>
                
                <hr>

                <div class="row">
                    <h5>Idiomas:</h5>
                </div>

                <?php
                $idiomaDados = $idiomaDAO->read($conexao, $id);

                foreach ($idiomaDados as $value) {
                    $lingua = $value->getIdioma();
                    $fluencia = $value->getFluencia();

                    echo "<h5>{$lingua} {$fluencia}</h5>";
                }
                ?>


                <hr>

                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <a href="javascript:history.back()" class="btn btn-default btn-round">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once './includes/footer.php';
?>
<?php

include_once '../conexao/conexao.php';
include_once '../classes/PessoaVO.php';
include_once '../classes/PessoaDAO.php';
include_once '../classes/ContatoVO.php';
include_once '../classes/ContatoDAO.php';
include_once '../classes/ExperienciaVO.php';
include_once '../classes/ExperienciaDAO.php';
include_once '../classes/FormacaoVO.php';
include_once '../classes/FormacaoDAO.php';
include_once '../classes/IdiomaVO.php';
include_once '../classes/IdiomaDAO.php';
include_once '../classes/OrigemVO.php';
include_once '../classes/OrigemDAO.php';
include_once '../classes/FamiliaVO.php';
include_once '../classes/FamiliaDAO.php';

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

$origemVO = new OrigemVO();
$origemDAO = new OrigemDAO();

$familiaVO = new FamiliaVO();
$familiaDAO = new FamiliaDAO();

//Dados do Formulário - Pessoa

$id_pessoa = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$estado_civil = filter_input(INPUT_POST, 'est_civil', FILTER_SANITIZE_STRING);
$origem = filter_input(INPUT_POST, 'origem', FILTER_SANITIZE_NUMBER_INT);
$data_entrada = filter_input(INPUT_POST, 'data_ent', FILTER_SANITIZE_STRING);

//Sets Pessoa
$pessoaVO->setNome($nome);
$pessoaVO->setData_nasc($data_nasc);
$pessoaVO->setSexo($genero);
$pessoaVO->setEstado_civil($estado_civil);
$pessoaVO->setId_origem($origem);
$pessoaVO->setData_entrada_brasil($data_entrada);
$pessoaVO->setId_pessoa($id_pessoa);

$update_pessoa = $pessoaDAO->update($pessoaVO, $conexao);
$pessoaDados = $pessoaDAO->read($conexao, $id_pessoa);
$id_contato = $pessoaDados->getId_contato();

//Dados do Formulário - Contato
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$rua = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);

//Sets Contato
$contatoVO->setId_contato($id_contato);
$contatoVO->setEmail($email);
$contatoVO->setTelefone($telefone);
$contatoVO->setRua($rua);
$contatoVO->setNumero($numero);
$contatoVO->setBairro($bairro);
$contatoVO->setCidade($cidade);
$contatoVO->setCep($cep);

$update_contato = $contatoDAO->update($contatoVO, $conexao);

//Usa um for para inserir a array de Familiares
for ($i = 0; $i < count($_POST['parentesco']); $i++) {

    $id_familiar = $_POST['id_familiar'][$i];
    $parentesco = $_POST['parentesco'][$i];
    $data_nasc_parente = $_POST['data_nasc_familia'][$i];
    $mora_junto = $_POST['mora_junto'][$i];

    $familiaVO->setId_familia($id_familiar);
    $familiaVO->setParentesco($parentesco);
    $familiaVO->setData_nasc_familiar($data_nasc_parente);
    $familiaVO->setMora_junto($mora_junto);
    $familiaVO->setId_pessoa($id_pessoa);

    $update_familia = $familiaDAO->update($familiaVO, $conexao);
}

//Dados do Formulário - Formação acadêmica
$profissao = filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING);
$desc_prof = filter_input(INPUT_POST, 'prof_desc', FILTER_SANITIZE_STRING);
$escolaridade = filter_input(INPUT_POST, 'escolaridade', FILTER_SANITIZE_STRING);
$grad_ano = filter_input(INPUT_POST, 'graduacao', FILTER_SANITIZE_STRING);
$instituicao = filter_input(INPUT_POST, 'instituicao', FILTER_SANITIZE_STRING);
$grad_cidade = filter_input(INPUT_POST, 'grad_cidade', FILTER_SANITIZE_STRING);
$grad_pais = filter_input(INPUT_POST, 'grad_pais', FILTER_SANITIZE_STRING);

//Sets Dados acadêmicos
$formVO->setProfissao($profissao);
$formVO->setDescricao($desc_prof);
$formVO->setEscolaridade($escolaridade);
$formVO->setAno_formacao($grad_ano);
$formVO->setInsituicao($instituicao);
$formVO->setCidade($grad_cidade);
$formVO->setPais($grad_pais);
$formVO->setId_pessoa($id_pessoa);

//Insere Dados Acadêmicos
$inserir_formacao = $formDAO->update($formVO, $conexao);

if ($update_pessoa && $update_contato) {
    echo "<script>alert('Curriculo atualizado com sucesso!')</script>";
    echo "<script>window.open('./detalhes.php?id=$id_pessoa','_self')</script>";
} else {
    echo "<script>alert('Algo de errado aconteceu, não foi possivel atualizar o curriculo!')</script>";
    echo "<script>window.open('./listar.php','_self')</script>";
}


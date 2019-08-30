<?php

require_once '../conexao/conexao.php';
require_once '../classes/PessoaVO.php';
require_once '../classes/PessoaDAO.php';
require_once '../classes/ContatoVO.php';
require_once '../classes/ContatoDAO.php';

$pessoaVO = new PessoaVO();
$pessoaDAO = new PessoaDAO();

$contatoVO = new ContatoVO();
$contatoDAO = new ContatoDAO();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$pessoaVO->setId_pessoa($id);
$contatoVO->setId_contato($id);

$deletar_pessoa = $pessoaDAO->delete($pessoaVO, $conexao);
$deletar_contato = $contatoDAO->delete($contatoVO, $conexao);

if (mysqli_affected_rows($conexao)) {
    echo "<script>alert('Registo apagado com sucesso!')</script>";
    echo "<script>window.open('./listar.php','_self')</script>";
} else {
    echo "<script>alert('Registo não apagado!')</script>";
    echo "<script>window.open('./listar.php','_self')</script>";
}

<?php 
    include_once '../conexao/conexao.php';
    include_once '../classes/PessoaVO.php';
    include_once '../classes/PessoaDAO.php';
    include_once '../classes/FormacaoVO.php';
    include_once '../classes/FormacaoDAO.php';

    $pessoaVO = new PessoaVO();
    $pessoaDAO = new PessoaDAO();
    $formVO = new FormacaoVO();
    $formDAO = new FormacaoDAO();


    $resultado = $pessoaDAO->readAll($conexao);

    $requestData = $_REQUEST;

    $columns = array(
        array( '0' => 'id_pessoa' ),
        array( '1' => 'nome' ),
        array( '2' => 'sexo' ),
    );

    $num_registros = numRegistros($conexao);
?>
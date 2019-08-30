<?php
$host = 'localhost';
$user = 'root';
$senha = '';
$bd = 'projetoht';

$conexao = mysqli_connect($host, $user, $senha, $bd);

if(!$conexao) {
    die('Erro ao conectar ao banco: ' . mysql_error());
}

mysqli_set_charset( $conexao, 'utf8');
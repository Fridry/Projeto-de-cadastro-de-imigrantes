<?php

session_start();

include_once '../conexao/conexao.php';

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if ($btnLogin) {

    $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    //echo password_hash($senha, PASSWORD_DEFAULT);


    if ((!empty($usuario)) AND ( !empty($senha))) {
        //Gerar senha criptografada
        //echo password_hash($senha, PASSWORD_DEFAULT);
        //pesquisar o usuario no banco

        $query = "SELECT * FROM tbadmin WHERE login = '$usuario' LIMIT 1";
       
        $resultado = mysqli_query($conexao, $query);
        
        if ($resultado) {
            $row_user = mysqli_fetch_assoc($resultado);

            $hash = $row_user['senha'];

            if (password_verify($senha, $hash)) {

                $_SESSION['id'] = $row_user['id_adm'];
                $_SESSION['nome'] = $row_user['nome_admin']; 
                header("Location: ../paginas_adm/home.php");
            } else {
                $_SESSION['msg'] = '<div class="alert alert-danger text-center" role="alert">Login ou Senha incorretos!</div>';
                header("Location: ./login.php");
            }
        }
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger text-center" role="alert">Login ou Senha inválidos!</div>';
        header("Location: ./login.php");
    }
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger text-center" role="alert">Página não encontrada</div>';
    header("Location: ./login.php");
}
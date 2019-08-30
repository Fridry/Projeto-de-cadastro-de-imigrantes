<?php

session_start();

unset(
        $_SESSION['id'],
        $_SESSION['nome'],
        $_SESSION['login'],
        $_SESSION['senha']);

//session_destroy ();

$_SESSION['msg'] = '<div class="alert alert-info text-center" role="alert">Deslogado com sucesso</div>';

header("Location: login.php");

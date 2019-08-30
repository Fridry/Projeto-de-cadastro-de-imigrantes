<?php
session_start();

$id = $_SESSION['id'];
$nome = $_SESSION['nome'];

if(!isset($id)) {
    $_SESSION['msg'] = '<div class="alert alert-danger text-center" role="alert">Área de acesso restrito!</div>';
    header("Location: ../login/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <script language="Javascript">
            function confirmacao(id) {
                var resposta = confirm("Deseja remover o registro " + id + "?");

                if (resposta == true) {
                    window.location.href = "exclui.php?id=" + id;
                }
            }
        </script> 

        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Projeto Haiti
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    </head>

    <body class="">
        <div class="wrapper ">
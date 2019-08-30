<?php 
    session_start();

    if(!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = "pt";
    } elseif (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        if($_GET['lang'] == "fr"){
            $_SESSION['lang'] = "fr";
        } elseif($_GET['lang'] == "en"){
            $_SESSION['lang'] = "en";
        } elseif($_GET['lang'] == "pt") {
            $_SESSION['lang'] = "pt";
        }
    }

    require_once "idiomas/" . $_SESSION['lang'] . ".php";

?>
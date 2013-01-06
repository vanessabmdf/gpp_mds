<?php
session_start();
include "conexao.php";
include '../classes_de_negocio/Usuario.class.php';
include '../classes_de_negocio/Solicitante.class.php';
include '../classes_de_negocio/Chamado.class.php';

    $login= $_SESSION['login'];
    $sql = mysql_query("SELECT * FROM usuario WHERE login = '$login'");
    
    //chamado= new Chamado();
    
?>
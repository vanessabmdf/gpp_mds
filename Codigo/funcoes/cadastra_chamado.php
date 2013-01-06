<?php
session_start();
include "conexao.php";
include '../classes_de_negocio/Usuario.class.php';
include '../classes_de_negocio/Solicitante.class.php';
include '../classes_de_negocio/Chamado.class.php';

    $login= $_SESSION['login'];
    $sql = mysql_query("SELECT * FROM usuario WHERE login = '$login'");
    $ln = mysql_fetch_array($sql);
    
    $cod_solicitante = $ln['cod_solicitante'];
    //chamado= new Chamado();
    
?>
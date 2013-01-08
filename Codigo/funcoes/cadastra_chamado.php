<?php
session_start();
include "conexao.php";
include '../classes_de_negocio/Chamado.class.php';

    $login= $_SESSION['login'];
    $sql = mysql_query("SELECT * FROM usuario WHERE login = '$login'");
    $ln = mysql_fetch_array($sql);
    $cod_solicitante = $ln['codigo_solicitante'];
    
    $chamado = new Chamado(NULL, NULL, $_POST['descricao'], NULL, NULL, NULL, $cod_solicitante);
    $bd = mysql_query("INSERT INTO `helpdesk`.`chamado` (`codigo`, `descricao`, `data_inicial`, `data_final`, `codigo_status`, `codigo_servico`, `codigo_tecnico`, `codigo_solicitante`) VALUES ('', '$chamado->descricao', '', '', '', '', '', '$chamado->cod_solicitante')");
    echo "<meta http-equiv='refresh' content='0; URL=../interface/chamado.php'>
		<script type=\"text/javascript\">
		alert(\"Chamado cadastrado\");
		</script>";
    
?>

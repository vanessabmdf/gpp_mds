<?php
session_start();
include "conexao.php";
include '../classes_de_negocio/Chamado.class.php';

    $login= $_SESSION['login'];
    $sql = mysql_query("SELECT * FROM usuario WHERE login = '$login'");
    $ln = mysql_fetch_array($sql);
    $cod_solicitante = $ln['codigo_solicitante'];
    $dataI = date("Y").'-'.date("m").'-'.date("d");
    $dataF = date("Y").'-'.date("m").'-'.(date("d")+7);
    $chamado = new Chamado(NULL, NULL, $_POST['descricao'], $dataI, $dataF, NULL, $cod_solicitante);
    $bd = mysql_query("INSERT INTO `helpdesk`.`chamado` (`codigo`, `descricao`, `data_inicial`, `data_final`, `codigo_status`, `codigo_servico`, `codigo_tecnico`, `codigo_solicitante`) VALUES ('', '$chamado->descricao', '$chamado->data_inicial', '$chamado->data_final', '', '', '', '$chamado->cod_solicitante')");
    echo "<meta http-equiv='refresh' content='0; URL=../interface/index.php'>
		<script type=\"text/javascript\">
		alert(\"Chamado cadastrado\");
		</script>";
    
?>
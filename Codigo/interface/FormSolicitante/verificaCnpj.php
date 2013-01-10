<?php
	require_once("../include/conexao.inc.php");
	require_once("include/Clbanco.php");

	$cnpj1=utf8_decode($_POST["cnpj"]);

	$cnpjObj = new banco($conn,$db);
	$cnpjObj->cnpjRepetido("gti_fornecedor",$cnpj1);

	mysql_close($conn);
	exit();
        
?>
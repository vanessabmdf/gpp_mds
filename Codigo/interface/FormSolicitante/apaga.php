<?php

require_once("../include/conexao.inc.php");
require_once("include/Clbanco.php");

$id=$_POST["id"];
	
$cadastro = new banco($conn,$db);
$cadastro->apaga("gti_fornecedor","$id");

mysql_close($conn);
exit();
?>
<?php

require_once("../include/conexao.inc.php");
require_once("include/Clbanco.php");

$id=utf8_decode($_POST["id"]);
$nome=utf8_decode($_POST["nomeFornecedor"]);
$cnpj=utf8_decode($_POST["cnpjFornecedor"]);
$fone=utf8_decode($_POST["foneFornecedor"]);
$contato=utf8_decode($_POST["contatoFornecedor"]);
$email=utf8_decode($_POST["emailFornecedor"]);
$obs=utf8_decode($_POST["obsFornecedor"]);

$cadastro = new banco($conn,$db);
$cadastro->altera("gti_fornecedor"," FO_TX_DS='$nome',FO_NR_CNPJ='$cnpj',FO_NR_FONE='$fone',FO_TX_CONTATO='$contato',FO_TX_EMAIL='$email',FO_TX_OBS='$obs' " ,"$id");
mysql_close($conn);
exit();

?>
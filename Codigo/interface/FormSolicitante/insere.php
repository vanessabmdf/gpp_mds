<?php
require_once("../include/conexao.inc.php");
require_once("include/Clbanco.php");

$nome=utf8_decode($_POST["nomeFornecedor"]);
$cnpj=utf8_decode($_POST["cnpjFornecedor"]);
$fone=utf8_decode($_POST["foneFornecedor"]);
$contato=utf8_decode($_POST["contatoFornecedor"]);
$email=utf8_decode($_POST["emailFornecedor"]);
$obs=utf8_decode($_POST["obsFornecedor"]);

$cadastro = new banco($conn,$db);
$cadastro->insere("gti_fornecedor","(FO_TX_DS,FO_NR_CNPJ,FO_NR_FONE,FO_TX_CONTATO,FO_TX_EMAIL,FO_TX_OBS)","('$nome','$cnpj','$fone','$contato','$email','$obs')");
mysql_close($conn);
exit();

?>
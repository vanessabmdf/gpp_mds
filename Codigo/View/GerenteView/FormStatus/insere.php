<?php
require_once("../../../controller/StatusCtrl.php");

$descricao=utf8_decode($_POST["descricao"]);
$status = new StatusCtrl();
$status->insStatus(NULL, $descricao);
?>
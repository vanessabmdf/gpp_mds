<?php

require_once("../../../controller/StatusCtrl.php");

$id=$_POST["id"];
$descricao=utf8_decode($_POST["descricao"]);

$status = new StatusCtrl();
$status->alteraStatus($id, $descricao, $id);

?>
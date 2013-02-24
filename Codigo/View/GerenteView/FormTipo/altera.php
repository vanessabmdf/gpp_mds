<?php

require_once("../../../controller/Tipo_ChamadoCtrl.php");

$id=$_POST["id"];
$descricao=utf8_decode($_POST["descricao"]);

$tipo_chamado = new Tipo_ChamadoCtrl();
$tipo_chamado->alteraTipo_Chamado($descricao, $id);

?>
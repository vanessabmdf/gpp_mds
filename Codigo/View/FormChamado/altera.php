<?php

require_once ("../../controller/ChamadoCtrl.php");

$id=$_POST["id"];
$data_inicial=  utf8_decode($_POST["data_inicial"]);
$data_final=  utf8_decode($_POST["data_final"]);
$descricao=  utf8_decode($_POST["descricao"]);
$solicitante=  utf8_decode($_POST["solicitante"]);
$tecnico=  utf8_decode($_POST["tecnico"]);
$status=  utf8_decode($_POST["status"]);
$solucao=  utf8_decode($_POST["solucao"]);
$tipoChamado=  utf8_decode($_POST["tipoChamado"]);
$local_equipamento=  utf8_decode($_POST["local_equipamento"]);

$chamado = new ChamadoCtrl();
$chamado->alteraChamado($id,$data_final,$data_inicial,$descricao,$local_equipamento,$solicitante,$solucao,$status,$tecnico,$tipoChamado);

?>

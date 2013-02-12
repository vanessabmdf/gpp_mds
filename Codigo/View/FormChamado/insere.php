<?php
require_once("../../controller/ChamadoCtrl.php");

$descricao=utf8_decode($_POST["descricao"]);
$equip_patrimonio=utf8_decode($_POST["equip_patrimonio"]);
$equip_localixaçao=utf8_decode($_POST["equip_localixaçao"]);
$tecnico=utf8_decode($_POST["tecnico"]);


$chamado = new ChamadoCtrl();
$chamado->insUsuario($descricao, $equip_patrimonio, $equip_localixaçao, $tecnico);


?>
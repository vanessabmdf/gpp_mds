<?php
require_once("../../../controller/ChamadoCtrl.php");

$descricao=$_POST['descricao'];
$solicitante_login=$_POST['solicitante'];
$status_cod=$_POST['status'];
//$tipoChamado=$_POST['tipo'];
$local_equipamento=$_POST['local'];
$equip_patrimonio=$_POST['patrimonio'];

$chamado= new ChamadoCtrl();
$chamado->insChamado($descricao, $solicitante_login, $status_cod, 1, $local_equipamento, $equip_patrimonio);
?>
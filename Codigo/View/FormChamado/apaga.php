<?php

require_once("../../controller/ChamadoCtrl.php");

$id=$_POST["id"];
	
$chamado = new ChamadoCtrl();
$chamado->deletarChamado($id);
?>

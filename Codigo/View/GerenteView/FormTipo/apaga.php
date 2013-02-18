<?php

require_once("../../../controller/Tipo_ChamadoCtrl.php");

$id=$_POST["id"];
	
$tipo_Chamado = new Tipo_ChamadoCtrl();
$tipo_Chamado->delTipo_Chamado($id);
?>
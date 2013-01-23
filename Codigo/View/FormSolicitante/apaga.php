<?php

require_once("../../controller/SolicitanteCtrl.php");

$id=$_POST["id"];
	
$solicitante = new SolicitanteCtrl();
$solicitante->delSolicitante($id);
?>
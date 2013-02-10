<?php

require_once("../../controller/StatusCtrl.php");

$id=$_POST["id"];
	
$solicitante = new StatusCtrl();
$solicitante->delStatus($id);
?>
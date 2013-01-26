<?php

require_once("../../controller/UsuarioCtrl.php");

$id=$_POST["id"];
	
$solicitante = new UsuarioCtrl();
$solicitante->delUsuario($id);
?>
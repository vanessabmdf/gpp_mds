<?php

require_once("../../../controller/ChamadoCtrl.php");

$id=$_POST["id"];
$status=($_POST["status"]);

$chamado = new ChamadoCtrl();
$chamado->alteraChamado($id, $_COOKIE['login_usuario'], $status);

?>
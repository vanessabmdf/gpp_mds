<?php

require_once("../../controller/UsuarioCtrl.php");

$id=$_POST["id"];
$nomeUsuario=utf8_decode($_POST["nomeUsuario"]);
$emailUsuario=utf8_decode($_POST["emailUsuario"]);
$matriculaUsuario=utf8_decode($_POST["matriculaUsuario"]);
$dataNascimento=utf8_decode($_POST["dtNascUsuario"]);
$datanova = explode("/", $dataNascimento);
$datanova = $datanova[2] . "-" . $datanova[1] . "-" . $datanova[0];

$loginUsuario=utf8_decode($_POST["loginUsuario"]);
$senhaUsuario=utf8_decode($_POST["senhaUsuario"]);

$solicitante = new UsuarioCtrl();
$solicitante->alteraUsuario($nomeUsuario, $emailUsuario, $matriculaUsuario, $datanova, $loginUsuario, $senhaUsuario,$id);

?>
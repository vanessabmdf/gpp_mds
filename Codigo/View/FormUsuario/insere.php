<?php
require_once("../../controller/UsuarioCtrl.php");

$nomeUsuario=utf8_decode($_POST["nomeUsuario"]);
$emailUsuario=utf8_decode($_POST["emailUsuario"]);
$matriculaUsuario=utf8_decode($_POST["matriculaUsuario"]);
$loginUsuario=utf8_decode($_POST["loginUsuario"]);
$senhaUsuario=utf8_decode($_POST["senhaUsuario"]);

$solicitante = new UsuarioCtrl();
$solicitante->insUsuario($loginUsuario, $senhaUsuario, $emailUsuario, $nomeUsuario, $matriculaUsuario, NULL);


?>
<?php

require_once("../../controller/SolicitanteCtrl.php");

$id=$_POST["id"];
$nomeSolicitante=utf8_decode($_POST["nomeSolicitante"]);
$emailSolicitante=utf8_decode($_POST["emailSolicitante"]);
$matriculaSolicitante=utf8_decode($_POST["matriculaSolicitante"]);
$dataNascimento=utf8_decode($_POST["dtNascSolicitante"]);
$datanova = explode("/", $dataNascimento);
$datanova = $datanova[2] . "-" . $datanova[1] . "-" . $datanova[0];

$nomeUsuario=utf8_decode($_POST["nomeUsuario"]);
$senhaUsuario=utf8_decode($_POST["senhaUsuario"]);

$solicitante = new SolicitanteCtrl();
$solicitante->alteraSolicitante($nomeSolicitante, $emailSolicitante, $matriculaSolicitante, $datanova, $nomeUsuario, $senhaUsuario,$id);

?>
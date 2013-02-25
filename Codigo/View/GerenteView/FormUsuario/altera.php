<?php

require_once("../../../controller/UsuarioCtrl.php");

$id=$_POST["id"];
$nome=utf8_decode($_POST["nomeUsuario"]);
$email=utf8_decode($_POST["emailUsuario"]);
$matricula=utf8_decode($_POST["matriculaUsuario"]);
$tipo=$_POST["perfilUsuario"];
$login=utf8_decode($_POST["loginUsuario"]);
$senha=utf8_decode($_POST["senhaUsuario"]);

$solicitante = new UsuarioCtrl();
$solicitante->alteraUsuario($login, $senha, $email, $nome, $matricula,$tipo, $id)

?>
<?php

require_once '../../controller/UsuarioCtrl.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$matricula = $_POST["matricula"];
$login = $_POST["loginUsuario"];
$senha = $_POST["senhaCadastro"];

$usuario = new UsuarioCtrl();

$usuario->insUsuario($login, $senha, $email, $nome, $matricula, 1);

header("Location:../../View/index.php");

?>

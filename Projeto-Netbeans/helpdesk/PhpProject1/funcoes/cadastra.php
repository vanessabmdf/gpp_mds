<?php
include "conexao.php";
include '../classes_de_negocio/Usuario.class.php';

if($_POST['senha']!=$_POST['confirmasenha']){
    header("Location: ../interface/novocadastro.php");
}else{
$user = new Usuario($_POST['login'], $_POST['senha'], NULL );

$sql = mysql_query("INSERT INTO usuario (login, senha) values ('$user->nome_usuario', '$user->senha')");
echo "<script type=\"text/javascript\">
	alert(\"Cadastro efetuado\");
	</script>";
header("Location: ../interface/home.php");
}
?>
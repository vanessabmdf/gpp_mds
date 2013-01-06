<?php
session_start();
include "conexao.php";
include '../classes_de_negocio/Usuario.class.php';

$user = new Usuario($_POST['login'], $_POST['senha'], NULL );

$sql = mysql_query("SELECT 'login','senha' FROM usuario WHERE login = '$user->nome_usuario' and 
	senha = '$user->senha'");
if(mysql_num_rows($sql)==true){
	while($ln = mysql_fetch_array($sql)){
	
	$_SESSION['login'] = $user->nome_usuario;
	$_SESSION['senha'] = $ln['senha'];
       
        }
	echo "<script type=\"text/javascript\">
	alert(\"Login efetuado\");
	</script>";
        header("Location: ../interface/chamado.php");
}else{
    header("Location: ../interface/home.php");
    exit;
}
?>

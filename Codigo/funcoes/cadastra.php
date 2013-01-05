<?php
include "conexao.php";
include '../classes_de_negocio/Usuario.class.php';
include '../classes_de_negocio/Solicitante.class.php';

if($_POST['senha']!=$_POST['confirmasenha']){
    header("Location: ../interface/novocadastro.php");
}else{
    
    $solicitante= new Solicitante($_POST['nome'],$_POST['email'],$_POST['matricula'],$_POST['data_nascimento']);
    //$user = new Usuario($_POST['login'], $_POST['senha'], NULL );
    echo $solicitante->getNome();
    $sql = mysql_query("INSERT INTO solicitante (nome, email,matricula) values ('$solicitante->nome', '$solicitante->email','$solicitante->matricula)");
    
    
    //$sql = mysql_query("INSERT INTO usuario (login, senha, codigo_solicitante) values ('$user->nome_usuario', '$user->senha', '')");
    echo "<script type=\"text/javascript\">
            alert(\"Cadastro efetuado\");
            </script>";
    header("Location: ../interface/home.php");
}
?>
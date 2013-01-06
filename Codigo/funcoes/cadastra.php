<?php
include "conexao.php";
include '../classes_de_negocio/Usuario.class.php';
include '../classes_de_negocio/Solicitante.class.php';

if($_POST['senha']!=$_POST['confirmasenha']){
    header("Location: ../interface/novocadastro.php");
}else{
    
    //Validar login.
    $sql = mysql_query("SELECT login FROM usuario");
    
    if(mysql_num_rows($sql)){
	while($ln = mysql_fetch_array($sql)){
            if( $_POST['login'] == $ln['login'])
                {
                    echo "Erro! Login ja cadastrado no sistema.";
                    exit(0);
                }
        
        }
    }
        
    //Validar matricula.
    $sql = mysql_query("SELECT matricula FROM solicitante");
    
    if(mysql_num_rows($sql)){
	while($ln = mysql_fetch_array($sql)){
            if( $_POST['matricula'] == $ln['matricula'])
                {
                    echo "Erro! Matricula ja cadastrada no sistema.";
                    exit(0);
                }
        
        }
    }
   
    $solicitante= new Solicitante($_POST['nome'],$_POST['email'],$_POST['matricula'],$_POST['data_nascimento']);
    $user = new Usuario($_POST['login'], $_POST['senha'], NULL );
    
    $sql = mysql_query("INSERT INTO `helpdesk`.`solicitante` (`nome`, `email`, `matricula`, `codigo`, `data_nascimento`) VALUES ('$solicitante->nome', '$solicitante->email', '$solicitante->matricula', '', '$solicitante->data_nascimento')");
    
    $sql = mysql_query("SELECT * FROM solicitante WHERE matricula = '$solicitante->matricula'");

    if(mysql_num_rows($sql)){
	while($ln = mysql_fetch_array($sql)){
        
        $cod=$ln['codigo'];
        $sql2 = mysql_query("INSERT INTO `helpdesk`.`usuario` (`login`, `senha`, `codigo_perfil`, `codigo_solicitante`, `codigo`) VALUES ('$user->nome_usuario', '$user->senha', '', $cod, '')");
        }
    }
    echo "<script type=\"text/javascript\">
            alert(\"Cadastro efetuado\");
            </script>";
    header("Location: ../interface/home.php");
}
?>
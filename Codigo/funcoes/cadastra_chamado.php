<?php
include "conexao.php";
include '../classes_de_negocio/Comentario.class.php';

    
    $comentario= new Comentario($_POST[''],$_POST['codigo'],$_POST['descriçao'],$_POST['cod_comentario']);
    $sql = mysql_query("INSERT INTO solicitante (codigo, descriçao, cod_comentario) values ('$->nome', '$comentario->codigo','$comentario->descriçao', '')");
    
    
    //$sql = mysql_query("INSERT INTO usuario (login, senha, codigo_solicitante) values ('$user->nome_usuario', '$user->senha', '')");
    echo "<script type=\"text/javascript\">
            alert(\"Cadastro efetuado\");
            </script>";

?>

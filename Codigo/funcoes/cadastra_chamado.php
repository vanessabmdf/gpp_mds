<?php
include "conexao.php";
include '../classes_de_negocio/Comentario.class.php';

    
    $comentario= new Comentario($_POST[''],$_POST['codigo'],$_POST['descriçao'],$_POST['cod_comentario']);
    $sql = mysql_query("INSERT INTO solicitante (codigo, descriçao, cod_comentario) values ('$->nome', '$comentario->codigo','$comentario->descriçao', '')");
   
    echo "<script type=\"text/javascript\">
            alert(\"Cadastro efetuado\");
            </script>";

?>

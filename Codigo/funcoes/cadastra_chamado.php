<?php
include "conexao.php";
include '../classes_de_negocio/Comentario.class.php';
include '../classes_de_negocio/Chamado.class.php';

    
    $comentario= new Comentario($_POST[''],$_POST['codigo'],$_POST['descriçao'],$_POST['cod_comentario']);
    $sql = mysql_query("INSERT INTO solicitante (codigo, descriçao, cod_comentario) values ('$->nome', '$comentario->codigo','$comentario->descriçao', '')");
	if(!$sql)
	{
		echo "Erro na insersecao do Comentario.";
		exit(1);
	}
	
	//Faltando mais argumentos.
	$chamado = new Chamado($_POST['descricao'], $_POST['data_inicial']);
	$sql = mysql_query("INSERT INTO chamado (cod_status, cod_servico, descricao, data_inicial, data_final, cod_tecnico, cod_solicitante, codigo) values ($chamado->cod_status, $chamado->cod_servico, $chamado->descricao, $chamado->data_inicial, $chamado->data_final, $chamado->cod_tecnico, $chamado->cod_solicitante, $chamado->chamado)");
	if(!$sql)
	{
		echo "Erro na insersecao do Chamado.";
		exit(1);
	}
	
    echo "<script type=\"text/javascript\">
            alert(\"Cadastro efetuado\");
            </script>";

?>

<?php

/*
 * Arquivo onde é montada a tabela de dados.
 * Todos os registros encontrados são passados para XML, para ser montada no site.js
 */
require_once("../../controller/Tipo_ChamadoCtrl.php");

$tipo_chamado = new Tipo_ChamadoCtrl();

//se encontrar registros	

        //Colocando Header como XML e setando o Collation para acento
	header("Content-type: application/xml"); 		
	$xml="<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";  
	
	
	
	//Titulo dos campos da tabela
	$camposTitulo = array("cod",
            "Codigo",
            "Descricao"
	);

	$xml.="<dados>";
	$xml.="<cabecalho>";
	
	//Cabecalho da tabela - Montando os Titulos
	for($i=0;$i < sizeof($camposTitulo);$i++){
		$xml.="<campo>".$camposTitulo[$i]."</campo>";
	}
	
	$xml.="</cabecalho>";
	
	//Corpo da Tabela - Setando os valores de cada campo
	foreach($tipo_chamado->listaTipo_Chamado() as $sol){
		$xml.="<registro>";	
                        $xml.="<item>".$sol["cod"]."</item>";
			$xml.="<item>".$sol["cod"]."</item>"; 
                        $xml.="<item>".$sol["descricao"]."</item>";
		$xml.="</registro>";		
	}
	
	//Fim da tabela
	$xml.="</dados>";	


echo $xml;
?>
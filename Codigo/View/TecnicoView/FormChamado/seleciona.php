<?php

/*
 * Arquivo onde é montada a tabela de dados.
 * Todos os registros encontrados são passados para XML, para ser montada no site.js
 */
require_once("../../../controller/ChamadoCtrl.php");

$chamado = new ChamadoCtrl();

//se encontrar registros	

        //Colocando Header como XML e setando o Collation para acento
	header("Content-type: application/xml"); 		
	$xml="<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";  
	
	
	
	//Titulo dos campos da tabela
	$camposTitulo = array("cod",
            "Codigo",
            "Data inicial",
            "Data final",            
            "Descricao",
            "Usuario",
            "Status",
            "Tipo",
            "Patrimonio",
            "Localizacao"
	);

	$xml.="<dados>";
	$xml.="<cabecalho>";
	
	//Cabecalho da tabela - Montando os Titulos
	for($i=0;$i < sizeof($camposTitulo);$i++){
		$xml.="<campo>".$camposTitulo[$i]."</campo>";
	}
	
	$xml.="</cabecalho>";
	
	//Corpo da Tabela - Setando os valores de cada campo
        //Aqui passar como parâmetro a SESSION  com o login do tecnico
	foreach($chamado->listaChamado() as $sol){
		$xml.="<registro>";	
                        $xml.="<item>".$sol["cod"]."</item>";
			$xml.="<item>".$sol["cod"]."</item>"; 
                        $xml.="<item>".$sol["data_inicial"]."</item>";
                        $xml.="<item>".$sol["data_final"]."</item>";
                        $xml.="<item>".$sol["descricao"]."</item>";
                        $xml.="<item>".$sol["usuario_login"]."</item>";
                        $xml.="<item>".$sol["desc_status"]."</item>";
                        $xml.="<item>".$sol["desc_tipo_chamado"]."</item>";
                        $xml.="<item>".$sol["patrimonio_equip"]."</item>";                        
                        $xml.="<item>".$sol["localizacao_equip"]."</item>";
		$xml.="</registro>";		
	}
	
	//Fim da tabela
	$xml.="</dados>";	
echo $xml;
?>
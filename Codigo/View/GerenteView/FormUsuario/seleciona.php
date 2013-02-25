<?php

/*
 * Arquivo onde é montada a tabela de dados.
 * Todos os registros encontrados são passados para XML, para ser montada no site.js
 */
require_once("../../../controller/UsuarioCtrl.php");

$solicitante = new UsuarioCtrl();

//se encontrar registros	

        //Colocando Header como XML e setando o Collation para acento
	header("Content-type: application/xml"); 		
	$xml="<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";  
	
	
	
	//Titulo dos campos da tabela
	$camposTitulo = array("log",
        "Nome",    
	"E-mail do solicitante",
	"Matricula",
	//"Data de Nascimento",
	"Login"
	);

	$xml.="<dados>";
	$xml.="<cabecalho>";
	
	//Cabecalho da tabela - Montando os Titulos
	for($i=0;$i < sizeof($camposTitulo);$i++){
		$xml.="<campo>".$camposTitulo[$i]."</campo>";
	}
	
	$xml.="</cabecalho>";
	
	//Corpo da Tabela - Setando os valores de cada campo
	foreach($solicitante->listaUsuario() as $sol){
		$xml.="<registro>";	
                        $xml.="<item>".$sol["login"]."</item>";
			$xml.="<item>".$sol["nome"]."</item>";
                        $xml.="<item>".$sol["email"]."</item>";
                        $xml.="<item>".$sol["matricula"]."</item>";
			$xml.="<item>".$sol["login"]."</item>";                
		$xml.="</registro>";		
	}
	
	//Fim da tabela
	$xml.="</dados>";	


echo $xml;
?>
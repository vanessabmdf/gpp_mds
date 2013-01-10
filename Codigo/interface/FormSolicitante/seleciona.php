<?php
require_once("../../controller/SolicitanteCtrl.php");

$solicitante = new SolicitanteCtrl();

//se encontrar registros	

	header("Content-type: application/xml"); 
		
	$xml="<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";  
	
	//preenchimento da Array com o nome dos campos
	
	//titulo dos campos da tabela
	$camposTitulo = array("Nome",
	"E-mail do solicitante",
	"Matricula",
        "Codigo",
	"Data de Nascimento",
	"Nome de Usuario"
	);

	$xml.="<dados>";
	$xml.="<cabecalho>";
	
	//cabecalho da tabela
	for($i=0;$i < sizeof($camposTitulo);$i++){
		$xml.="<campo>".$camposTitulo[$i]."</campo>";
	}
	
	$xml.="</cabecalho>";
	
	//corpo da tabela
	foreach($solicitante->listaSolicitante() as $sol){
		$xml.="<registro>";		
			$xml.="<item>".$sol["nome"]."</item>";
                        $xml.="<item>".$sol["email"]."</item>";
                        $xml.="<item>".$sol["matricula"]."</item>";
                        $xml.="<item>".$sol["codigo"]."</item>";
                        $xml.="<item>".$sol["data_nascimento"]."</item>";                    
		$xml.="</registro>";		
	}
	
	//fim da tabela
	$xml.="</dados>";	


echo $xml;
?>
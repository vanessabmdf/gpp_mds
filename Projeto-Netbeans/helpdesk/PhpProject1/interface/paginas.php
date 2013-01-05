<?php
	switch($_GET['p']){
	default:
	include "home.php";
	break;
	
	case 'solucao':
	include "solucao.php";
	break;
	
	case 'chamado':
	include "chamado.php";
	break;
	
	case 'usuario':
	include "usuario.php";
	break;
	
	case 'contato':
	include "contato.php";
	break;
	
	case 'Fazer cadastro':
	include "novocadastro.php";
	break;
	}
?>
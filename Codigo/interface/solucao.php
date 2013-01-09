<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<?php
    include "topo.php"
?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div id="conteudo">

<div id="cont">

<h2>Página de soluçãoo</h2>
<?php
	session_start();
	if(!isset($_SESSION['login']) and !isset($_SESSION['senha'])){
        echo("Faça o login para acessar o conteúdo da página");
	
	exit;
	}else{
            echo("logado");
        }
?>

</div><!-- fim div cont -->
</div>
<?php
    include "rodape.php"
?>
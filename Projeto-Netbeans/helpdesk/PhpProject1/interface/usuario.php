<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div id="conteudo">

<div id="cont">

<h2>Página de Usuario</h2>
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

<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<?php
    include "topo.php"
?>

<div id="conteudo">
<div id="cont">

<h2>Cadastrar Chamado</h2>
<?php
	session_start();
	if(!isset($_SESSION['login']) and !isset($_SESSION['senha'])){
        echo("Faça o login para acessar o conteúdo da página");
	
	exit;
	}
?>
<hr> 
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<form method="post" action="../funcoes/cadastra.php">
<table width="280" border="0">
  <tr>
    <td>Descricao:</td>
    <td><textarea name="descricao" rows="10" cols="40"></textarea></td>
  </tr>  
  <tr>
    <td >&nbsp;</td>
    <td align="center"> <input type="submit" value="Cadastrar" /></td>
  </tr>
</table>
</form>
</body>
</html>
</div><!-- fim div cont -->
</div> <!-- fim div conteudo -->
<?php
    include "rodape.php"
?>

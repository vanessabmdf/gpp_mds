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

<h2>Página de chamado</h2>

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

</div> <!-- fim div conteudo -->
<form method="post" action="../funcoes/novochamado.php">
<table width="280" border="0">
    <tr>
     <td ></td>
     <td align="center"><input type="submit" value="Cadastrar chamado" /></td>
   </tr>
</table>
</form>

<?php
    include "rodape.php"
?><link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<?php
    include "topo.php"
?>

<div id="conteudo">
<div id="cont">

<h2>Cadastrar Chamado</h2>

<hr> 
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<form method="post" action="../funcoes/cadastra.php">
<table width="280" border="0">
  <tr>
    <td width="133">Solicitante(Codigo):</td>
    <td width="137"><input type="text" name="codigo_solicitante" /></td>
  </tr>
  <tr>
    <td>Data Inicial:</td>
    <td><input type="text" name="data_inicial"/></td>
  </tr>
  <tr>
    <td>Descricao:</td>
    <td><input type="text" name="descricao"/></td>
  </tr>

   <tr>
        <td align="center">&nbsp;</td>
        <td> <input type="submit" value="Cadastrar" /></td>
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

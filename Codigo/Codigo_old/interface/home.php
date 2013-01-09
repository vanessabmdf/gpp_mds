<?php
	session_start();
	if(isset($_SESSION['login']) and isset($_SESSION['senha'])){
            header("Location: logout.php");
	}
?>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<?php
    include "topo.php"
?>

<div id="conteudo">

<div id="cont">

    <h2>Página inicial</h2>

<hr>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<form method="post" action="../funcoes/logar.php">
<table width="200" border="0">
    <tr>
    <td align="right">Login: </td>
    <td><input type="text" name="login" /></td>
    </tr>
  <tr>
    <td align="right">Senha: </td>
    <td><input type="text" name="senha"/></td>
    </tr>
   <tr>
        <td align="right">&nbsp;</td>
        <td align="center"> <input type="submit" value="Logar" /></td>
        </tr>

</table>
</form>
<br>
    <a href="recuperasenha.php">Esqueci a senha</a><br>
    <a href="novocadastro.php">Fazer cadastro</a>
</body>
</html>
</div><!-- fim div cont -->

</div> <!-- fim div conteudo -->
<?php
    include "rodape.php"
?>
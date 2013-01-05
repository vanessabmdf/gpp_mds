<div id="conteudo">

<div id="cont">


<h2>Página inicial</h2>

<hr>
<?php
	session_start();
	if(!isset($_SESSION['login']) and !isset($_SESSION['senha'])){
            header("Location: home.php");
	}
?>

<html >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<img src="images/perfil.gif" height="178" width="146" style="float:left; margin-right:70px; margin-bottom:0px;">
<br><br>
Usuário :<br>
email : <br><br>
<form method="post" action="../funcoes/sair.php"><tr>
        <td align="center">&nbsp;</td>
        <td><input type="submit" value="Logout" /></td>
</tr>
</form>
</body>
</html>
</div><!-- fim div cont -->

</div> <!-- fim div conteudo --><table width="200" border="1">


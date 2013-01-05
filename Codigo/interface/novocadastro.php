<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<?php
    include "topo.php"
?>

<div id="conteudo">
<div id="cont">

<h2>Novo Cadastro</h2>

<hr> 
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<form method="post" action="../funcoes/cadastra.php">
<table width="280" border="0">
  <tr>
    <td width="133">Nome:</td>
    <td width="137"><input type="text" name="nome" /></td>
  </tr>
  <tr>
    <td>email:</td>
    <td><input type="text" name="email"/></td>
  </tr>
  <tr>
    <td>matricula:</td>
    <td><input type="text" name="matricula"/></td>
  </tr>

   <tr>
        <td>Login:</td>
        <td><input type="text" name="login"/></td>
        </tr>
   <tr>
     <td>Senha:</td>
     <td><input type="text" name="senha"/></td>
   </tr>
   <tr>
     <td>Confirma Senha:</td>
     <td><input type="text" name="confirmasenha"/></td>
   </tr>
   <tr>
     <td>data de nascimento:</td>
     <td><input type="text" name="data_nascimento"/></td>
   </tr>
   <tr>
     <td ></td>
     <td align="center"><input type="submit" value="Cadastrar" /></td>
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
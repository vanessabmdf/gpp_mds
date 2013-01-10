<?php
	$conn = mysql_connect("127.0.0.1","root","root") or die ("Nao foi possivel conectar");
	$db = mysql_select_db("gti",$conn) or die ("Nao foi possivel localizar o banco de dados");
?>
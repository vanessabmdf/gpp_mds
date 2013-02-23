<?php
        setcookie("login_usuario", "", time() - 3600, "/");
        setcookie("senha_usuario", "", time() - 3600, "/");
	
	header("Location:../index.php");
?>
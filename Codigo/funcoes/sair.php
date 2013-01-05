<?php
	session_start();
	if(isset($_SESSION['login']) and isset($_SESSION['senha'])){
            echo 'pag sair';
            unset($_SESSION['login']);
            unset($_SESSION['login']);
	}
?>
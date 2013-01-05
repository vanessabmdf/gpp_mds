<?php
	session_start();
	if(isset($_SESSION['login']) and isset($_SESSION['senha'])){
            echo 'page';
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            
            echo $_SESSION['login']; 
           // header("Location: ../interface/home.php");
	}
?>
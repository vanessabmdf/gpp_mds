<?php
    $usuario = $_COOKIE['perfil_usuario'];
    if($usuario!="Gerente")
        header("Location: ../../../View/restrito.php");
?>

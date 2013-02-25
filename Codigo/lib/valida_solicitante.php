<?php
    $usuario = $_COOKIE['perfil_usuario'];
    if($usuario!="Solicitante")
        header("Location: ../../../View/restrito.php");
?>

<?php
    $usuario = $_COOKIE['perfil_usuario'];
    if($usuario!="Técnico")
        header("Location: ../../../View/restrito.php");
?>
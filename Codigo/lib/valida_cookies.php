<?php
    require_once '../../../controller/UsuarioCtrl.php';
    
    $usuario = new UsuarioCtrl();
    
    if(!(isset($_COOKIE['login_usuario']) or isset($_COOKIE['senha_usuario']))){
        header("Location:../../../View/login/index.php");
        exit;
        
    }
    
    if(isset($_COOKIE['login_usuario']))
        $login_usuario = $_COOKIE['login_usuario'];
    if (isset($_COOKIE['senha_usuario']))
        $senha_usuario = $_COOKIE['senha_usuario'];
    
    if(!(empty($login_usuario) or empty($senha_usuario))){
        $valida_login = $usuario->validaLogin($login_usuario, $senha_usuario);
        if($valida_login===0){
            setcookie("login_usuario");
            setcookie("senha_usuario");
            header("Location:../../../View/login/index.php");
            exit;
        }
        
        
    }
    
    
    if(empty($login_usuario) or empty($senha_usuario)){
        header("Location:../../../View/login/index.php");
        exit;
    
    }
?>

<?php

include '../../controller/UsuarioCtrl.php';
 
    $nome = $_POST['nomeUsuario'];
    $email = $_POST['emailUsuario'];
    $matricula = $_POST['matriculaUsuario'];
    $login = $_POST['loginUsuario'];
    $senha = $_POST['senhaUsuario'];
    
    $novamatricula = explode("/", $matricula);
    $array= array($novamatricula[0], $novamatricula[1]);
    $matriculanew = implode('', $array);
    $matriculanova = (int)$matriculanew;
    

    $usuario = new UsuarioCtrl();

    $registros = $usuario->validaLoginCadastro($login);
   
    if($registros==1)
        echo "ERROR!";
    else 
        $usuario->insUsuario($login, $senha, $email, $nome, $matriculanova, 1);
    
    
    header("Location: ../index.php");
    
?>

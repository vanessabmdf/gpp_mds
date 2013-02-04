<?php
     require_once '../../controller/UsuarioCtrl.php';

    //OBTÉM OS VALORES DIGITADOS NO FORMULÁRIO PELO JQUERY.AJAX
    $nome_usuario = $_POST["nomeUsuario"];
    $senha_usuario = $_POST["senhaUsuario"];
    
    $usuario = new UsuarioCtrl();
    $linhas = $usuario->validaLogin($nome_usuario, $senha_usuario);
    
    //TESTA SE A CONSULTA RETORNOU UM REGISTRO. SE RETORNAR, CRIAR COOKIES
    if($linhas!=1){
        
    }
    
    else{
        setcookie("nome_usuario", $nome_usuario); 
        setcookie("senha_usuario", $senha_usuario); 
        
        //DIRECIONA PARA A PÁGINA INICIAL DO SITE
        header("Location:../../View/paginaprincipal.php");//COLOCAR AQUI A PÁGINA INICIAL DO SITE      
    } 
?>

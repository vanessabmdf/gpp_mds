<?php
     require_once '../../Codigo/controller/UsuarioCtrl.php';
     
     $aux = 0;
    //OBTÉM OS VALORES DIGITADOS NO FORMULÁRIO PELO JQUERY.AJAX
    if(isset($_POST['enviar'])){
        $nome_usuario = $_POST["nomeLogin"];
        $senha_usuario = $_POST["senhaLogin"];

        $usuario = new UsuarioCtrl();
        $linhas = $usuario->validaLogin($nome_usuario, $senha_usuario);
        
        $aux++;
        //TESTA SE A CONSULTA RETORNOU UM REGISTRO. SE RETORNAR, CRIAR COOKIES
        if($linhas===0 && $aux===1){
            echo "<div id='erroLogin'><span class='msgError'>Nome de usuário ou senha incorretos</span></div>";
        }

        else{
            setcookie("nome_usuario", $nome_usuario); 
            setcookie("senha_usuario", $senha_usuario); 

            //DIRECIONA PARA A PÁGINA INICIAL DO SITE
            header("Location:../../Codigo/View/FormChamado/index.php");//COLOCAR AQUI A PÁGINA INICIAL DO SITE      
        } 
        
    }
?>

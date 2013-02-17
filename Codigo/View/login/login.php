<?php
     require_once '../../Codigo/controller/UsuarioCtrl.php';
     
     $aux = 0;
    //OBTÉM OS VALORES DIGITADOS NO FORMULÁRIO 
    if(isset($_POST['enviar'])){
        $nome_usuario = $_POST["nomeLogin"];
        $senha_usuario = $_POST["senhaLogin"];
        
        $usuario = new UsuarioCtrl();
        $linhas = $usuario->validaLogin($nome_usuario, $senha_usuario);
        $perfil_cod = $usuario->verificalogin($nome_usuario);
        
        
        
        $aux++;
        //TESTA SE A CONSULTA RETORNOU UM REGISTRO. SE RETORNAR, CRIAR COOKIES
        if($linhas===0 && $aux===1){
            echo "<div id='erroLogin'><span class='msgError'>Nome de usuário ou senha incorretos</span></div>";
        }

        else{
            setcookie("nome_usuario", $nome_usuario); 
            setcookie("senha_usuario", $senha_usuario); 

            
            if($perfil_cod==1)
                header("Location:../../Codigo/View/FormChamado/index.php");//REDIRECIONA A HOME DO USUARIO
           elseif($perfil_cod==2)
               header("Location:../../Codigo/View/provisorio.php");//REDIRECIONA A HOME TECNICO
            elseif($perfil_cod==3)
                header("Location:../../Codigo/View/FormUsuario/index.php");//REDIRECIONA A HOME DO GERENTE
        } 
        
    }
?>

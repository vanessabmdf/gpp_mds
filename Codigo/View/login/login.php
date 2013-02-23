<?php
     require_once "/../controller/UsuarioCtrl.php";
     
     $aux = 0;
    //OBTÉM OS VALORES DIGITADOS NO FORMULÁRIO 
    if(isset($_POST['enviar'])){
        $login_usuario = $_POST["nomeLogin"];
        $senha_usuario = $_POST["senhaLogin"];
        
        $usuario = new UsuarioCtrl();
        $linhas = $usuario->validaLogin($login_usuario, $senha_usuario);
        
        $verifica_usuario = $usuario->obterUsuario_Especifico($login_usuario);
        
        if($verifica_usuario!=FALSE){
            $perfil_cod = $usuario->verificalogin($login_usuario);
            $nome_usuario = $verifica_usuario->getNome();
        }
        
        
        $aux++;
        //TESTA SE A CONSULTA RETORNOU UM REGISTRO. SE RETORNAR, CRIAR COOKIES
        if($linhas===0 && $aux===1){
            echo "<div id='erroLogin'><span class='msgError'>Nome de usuário ou senha incorretos</span><br><br><br><a href='../View/index.php'><button class='botaoCadastro botaoErro'>Ok</button></a></div>";
        }

        else{
            setcookie("nome_usuario", $nome_usuario, time()+3600, "/"); 
            setcookie("login_usuario", $login_usuario, time()+3600, "/");
            setcookie("senha_usuario", $senha_usuario, time()+3600, "/");
            
            if($perfil_cod==1){
                setcookie("perfil_usuario", "Solicitante", 0, "/");
                header("Location:../../Codigo/View/SolicitanteView/FormChamado/index.php");//REDIRECIONA A HOME DO USUARIO
            }
           elseif($perfil_cod==2){
                setcookie("perfil_usuario", "Tecnico", 0, "/");
                header("Location:../../Codigo/View/TecnicoView/FormChamado/login.php");//REDIRECIONA A HOME TECNICO
           }
           elseif($perfil_cod==3){
                setcookie("perfil_usuario", "Gerente", 0, "/");
                header("Location:../../Codigo/View/GerenteView/FormUsuario/index.php");//REDIRECIONA A HOME DO GERENTE
           }
        } 
        
    }
?>

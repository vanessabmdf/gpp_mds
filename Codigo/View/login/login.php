<?php
    require_once "../../lib/Conection.php";

    //Obtém os valores digitados
    $nome_usuario = $_POST["nomeUsuario"];
    $senha_usuario = $_POST["senhaUsuario"];
    
    //inicializa variável $linhas com valor 0
    $linhas = 0;
    
    //corrigir problemas de acentuação
    $erro = utf8_decode ("Nome de Usuário ou Senha Incorretos");
    
    
    //acesso ao banco de dados
    $con = new Conection();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stm = $con->query("SELECT * FROM usuario WHERE nome_usuario='$nome_usuario' AND senha_usuario='$senha_usuario'");
    
    //Verifica se o acesso retornou somente um registro
    foreach ($stm as $row){
        $linhas++;
    }
    
    //testa se a consulta retornou algum registro
    if($linhas!=1){
        echo "<p align=\"center\">$erro</p>";
        echo "<p align=\"center\"><a href=\"../index.php\">Voltar</a>";
    }
    
    else{
        setcookie("nome_usuario", $nome_usuario); //cria um cookie cujo nome é "nome_usuario" e valor é $nome_usuario
        setcookie("senha_usuario", $senha_usuario); //cria um cookie cujo nome é "senha_usuario" e valor é $senha_usuario
        
        //DIRECIONA PARA A PÁGINA INICIAL DO SITE
        header("Location:../paginaprincipal.php");//COLOCAR AQUI A PÁGINA INICIAL DO SITE
        
        
    }
        //fecha a conexão com o banco
        try {
                $con = null;    
            } catch (PDOException $erro) {
            	echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            
            }
            
        
        
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="login/css/formulario.css" rel="stylesheet" type="text/css" />
        <link href="login/css/layout.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="login/js/login.js"></script>
    </head>
    
    <body>
    <div id="topo">
    	<img src="imagens/LogoGTI_menor.jpg" align="center" />
    </div>
    <div id="box">
        <div id="boxconteudo">
            <div id="paineldireito">
                <h1>Login</h1>
                <?php include "login/caixacadastro.php"; ?>
            </div>
            
            <div id="painelesquerdo">
                <?php include "login/cadastro.php"; ?>
                <?php include "login/criarconta.php"; ?>
                <?php include "login/comofunciona.php";?>
            </div>    
        </div>
    </div>
    </body>
</html>

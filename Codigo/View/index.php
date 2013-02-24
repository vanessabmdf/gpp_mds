<!DOCTYPE html>
<div id="erroLoginHidden"><?php include 'login/login.php'; ?></div>
<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <link href="login/css/formulario.css" rel="stylesheet" type="text/css" />
        <link href="login/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="css/examples.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="login/js/login.js"></script>
        <script type="text/javascript" src="js/jquery/jquery-impromptu.3.1.js"></script>
        <script type="text/javascript" src="js/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery/jquery.maskedinput.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                // validate signup form on keyup and submit
               validacaoCadastro = $("#formCadastro").validate({
                        rules: {
                            nomeUsuario: {
                                required: true,
                                minlength: 5
                                },
                            emailUsuario:{
                                required: true,
                                email: true
                            },
                            confirmaEmail: {
                                required: true,
                                equalTo: "#emailUsuario"
                            },
                            matriculaUsuario: {
                                required: true,
                                minlength: 10
                            },
                            loginUsuario: {
                                required: true,
                                minlength: 6
                            },
                            senhaUsuario: {
                                required: true,
                                minlength: 6
                            },
                            confirmaSenha: {
                                    required: true,
                                    equalTo: "#senhaUsuario"
                            }
                        }, 
                        messages: {
                            nomeUsuario:{
                                required: "Digite o seu nome",
                                minlength: "Mínimo de 5 caracteres"
                            },
                             emailUsuario:{
                                required: "Digite o seu e-mail",
                                email: "Digite um e-mail válido"
                            },
                            confirmaEmail: {
                                required: "Confirme o seu e-mail",
                                equalTo: "Confirmação inválida"
                            },
                            matriculaUsuario: {
                                required: "Digite a sua matrícula",
                                minlength: "Digite a matricula corretamente"
                            },
                            loginUsuario: {
                                required: "Escolha um nome de usuário",
                                minlength: "Mínimo 6 caracteres"
                            },
                            senhaUsuario: {
                                required: "Escolha uma senha",
                                minlength: "Mínimo 6 dígitos"
                            },
                            confirmaSenha: {
                                required: "Confirma a sua senha",
                                equalTo: "Confirmação Inválida"
                            }
                        }
                });
                
                validacaoLogin = $("#formLogin").validate({
                        submitHandler: function(form) {
                            form.submit();
                        },
                        rules: {
                            nomeLogin: {
                                required: true,
                                minlength: 5
                            },
                            senhaLogin: {
                                required: true,
                                minlength: 5
                            } 
                        }, 
                        messages: {
                            nomeLogin: {
                                required: "Digite seu nome de usuário",
                                minlength: "Mínimo 5 caracteres"
                            },
                            senhaLogin: {
                                required: "Digite a sua senha",
                                minlength: "Mínimo 5 dígitos"
                            }
                        }
                    });
                });
                
            jQuery(function($){
                $("#matriculaUsuario").mask("99/9999999",{placeholder:" "});
            });
            
            function limpaValidacaoCadastro(){
                validacaoCadastro.resetForm();
            }
            function limpaValidacaoLogin(){
                validacaoLogin.resetForm();
            }
        </script>  
        <script type="text/javascript" src="login/js/cadastro.js"></script>
    </head>
    <body onload="escondeErro();window.clear.history(1);">
        <div id="topo">
            <img src="imagens/LogoGTI_menor.jpg" align="center" />
        </div>
        <div id="box">
            <div id="boxconteudo">
                <div id="paineldireito">
                    <h1 class="paineldireito">Login</h1>
                    <?php include "login/caixalogin.php"; ?>
                </div>

                <div id="painelesquerdo">
                    <?php include "login/formCadastro.php"; ?>
                    <?php include "login/criarconta.php"; ?>
                    <?php include "login/comofunciona.php";?>
                </div>    
            </div>
        </div>
    </body>
</html>

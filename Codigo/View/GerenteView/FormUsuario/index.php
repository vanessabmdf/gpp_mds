<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>HelpDesk - Faculdade UnB Gama</title>
        <link href="../../css/layout.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../../css/superfish.css" media="screen" />
        <link href="../../css/examples.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="../../css/blue/style.css" type="text/css" media="print, projection, screen" />
        <link href="css/formUsuario.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="../../css/layoutform.css" rel="stylesheet" type="text/css" media="screen" />


        <script src="../../js/jquery/jquery-1.4.2.min.js"></script> 
        <script src="../../js/jquery/jquery.validate.js"></script>
        <script src="../../js/jquery/jquery-impromptu.3.1.js"></script>
        <script src="../../js/jquery/jquery.maskedimput-1.3.js"></script>
        <script src="../../js/jquery/jquery.limit-1.2.js"></script>
        <script src="../../js/jquery/jquery.blockUI.js"></script>
        <script src="../../js/hoverIntent.js"></script>
        <script src="../../js/superfish.js"></script>
        
        <script src="../../js/dataHora.js"></script>
        <script src="js/site.js"></script>

        <script type="text/javascript">
            var validacao;    
            document.onkeydown = function(e){
                var keychar;
        
                // Internet Explorer
                try {
                    keychar = String.fromCharCode(event.keyCode);
                    e = event;
                }
        
                // Firefox, Opera, Chrome, etc...
                catch(err) {
                    keychar = String.fromCharCode(e.keyCode);
                }
        
                if (e.ctrlKey && keychar == '1') {
                    valida_form();
                    return false;
                }
                if (e.ctrlKey && keychar == '2') {
                    $("#nomeUsuario").addClass('marcado');
                    $("#emailUsuario").removeClass('marcado');
                    $("#dtNascUsuario").removeClass('marcado');
                    $("#matriculaUsuario").removeClass('marcado');
                    $("#nomeUsuario").removeClass('marcado'); 
                    $("#senhaUsuario").removeClass('marcado');
                    limpa_form();
                    return false;
                }
        
            }
    
            $(document).ready(function() {
                $('input[type=text], textarea, input[type=password]').focus(function() {
                    $(this).addClass('marcado');
                });
                $('input[type=text], textarea, input[type=password]').blur(function() {
                    $(this).removeClass('marcado');
                });
            }); 
    
            $(document).ready(function() {
                validacao = $("#formUsuario").validate({
                    rules: {
                        nomeUsuario: {nome: 5},
                        emailUsuario: {email: true},
                        //dtNascUsuario: {required: true, date: true},
                        matriculaUsuario: {nome: 4},
                        nomeUsuario: {nome: 6},
                        senhaUsuario: {nome: 6}
                
                    },
                    messages: {
                        nomeUsuario: { nome: "&nbsp;Mínimo de 5 caracteres!"}, 
                        emailUsuario: { email: '&nbsp;E-mail inválido!'},
                        //dtNascUsuario: { required: '&nbsp;Preencha uma data válida!', date: '&nbsp;Preencha uma data válida!'},
                        matriculaUsuario: { nome: '&nbsp;Mínimo de 4 caracteres!'},
                        nomeUsuario: { nome: "&nbsp;Mínimo de 6 caracteres!"},
                        senhaUsuario: { nome: "&nbsp;Mínimo de 6 caracteres!"}
                    },
                    submitHandler:function(form) {
                        alert('ok');
                    }
                });
                $("#dtNascUsuario").mask("9?9/99/9999");
	
            });
       
            function limparValidacao()
            {
                validacao.resetForm();
            }  
    
    
        </script>        
        
        
        <script>
            jQuery(function(){
                jQuery('ul.sf-menu').superfish();
            });

         </script>
        <noscript>Habilite o Javascript para visualizar esta p�gina corretamente...</noscript>
    </head>
    <body onload="dataHora();carregando()">
        <!--div's do cabecalho-->
        <div id="box"> <!-- Inicio div box-->
            <?php
            require_once ("../../topo.php");
            ?>
            <!--div's do conteudo-->
            <div id="boxcaixabaixo">                
                <?php
                require_once ("../../menu.php");
                require_once ("../../ondeestou.php");
                ?>
                <div id="boxbaixo"> <!--Inicio div boxbaixo--> 
                    <?php
                    require_once ("../../menulateral.php");
                    ?>
                    <div id="boxconteudo">
                        <h1>Cadastro de Técnicos</h1>
                        <div id="boxcadastro">                            	
                            <form id="formUsuario" action="#" method="POST" class="form">
                                <fieldset>
                                    <label class="nomeUsuario" for="nomeUsuario">
                                        Nome Completo:
                                        <input class="nomeUsuario" id="nomeUsuario" type="text" name="nomeUsuario" size="25" />              
                                    </label>                                                                      
                                </fieldset>
                                <fieldset>
                                    <label class="emailUsuario" for="emailUsuario">
                                        Email:
                                        <input class="emailUsuario" id="emailUsuario" type="text" name="emailUsuario" size="25">   
                                    </label> 
                                    <label class="matriculaUsuario" for="matriculaUsuario">
                                        Matricula:
                                        <input class="matriculaUsuario" id="matriculaUsuario" type="text" name="matriculaUsuario" size="25" />  
                                    </label> 
                                    <!--<label class="dtNascUsuario" for="dtNascUsuario">
                                        Data de Nascimento:
                                        <input class="dtNascUsuario" id="dtNascUsuario" type="text" name="dtNascUsuario" size="25" /> 
                                    </label>-->  
                                </fieldset>
                                <fieldset>
                                    <label class="loginUsuario" for="loginUsuario">
                                        Nome de Usuário:
                                        <input class="loginUsuario" id="loginUsuario" type="text" name="loginUsuario" size="25" />  
                                    </label>  
                                    <label class="senhaUsuario" for="senhaUsuario">
                                        Senha(Mínimo 6 caracteres):
                                        <input class="senhaUsuario" id="senhaUsuario" type="password" name="senhaUsuario" size="25" />  
                                    </label>  
                                </fieldset>
                                <input type="hidden" id="perfilUsuario" name="perfilUsuario" value="2" />
                                <input type="button" id="botao" value="Salvar" onClick=valida_form() class="botoesInput" />
                                <input type="button" id="limpar" value="Limpar" onClick="limpa_form();limparValidacao();" class="botoesInput" />
                                <input type="hidden" id="acao" value="" />
                            </form>
                        </div>


                        <script src="../../js/jquery/jquery.tablesorter.js"></script>
                        <script src="../../js/jquery/jquery.tablesorter.pager.js"></script>
                        <script src="../../js/jquery/jquery.tablesorter.filter.js"></script>

                        <div id="boxtabela">
                            <div id="resultado" class></div>   
                        </div>
                    </div>
                </div> <!--fim div boxbaixo -->

                <div id="clear"></div> <!--Inicio e fim da div clear-->
            </div>  	
        </div> <!-- fim div box-->
    </body>
</html>

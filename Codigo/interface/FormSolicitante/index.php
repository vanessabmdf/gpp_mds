<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?
//pegar a url atual com variaveis de ambiente
$server = $_SERVER['SERVER_NAME'];
$endereco = $_SERVER ['REQUEST_URI'];
//echo "http://" . $server . $endereco;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>HelpDesk - Faculdade UnB Gama</title>
        <link href="../css/layout.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/superfish.css" media="screen" />
        <link href="../css/examples.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/blue/style.css" type="text/css" media="print, projection, screen" />
        <link href="css/formSolicitante.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="../css/layoutform.css" rel="stylesheet" type="text/css" media="screen" />


        <script src="../js/jquery/jquery-1.4.2.min.js"></script> 
        <script src="../js/jquery/jquery.validate.js"></script>
        <script src="../js/jquery/jquery-impromptu.3.1.js"></script>
        <script src="../js/jquery/jquery.maskedimput-1.3.js"></script>
        <script src="../js/jquery/jquery.limit-1.2.js"></script>
        <script src="../js/jquery/jquery.blockUI.js"></script>
        <script src="../js/hoverIntent.js"></script>
        <script src="../js/superfish.js"></script>

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
                    $("#nomeSolicitante").addClass('marcado');
                    $("#emailSolicitante").removeClass('marcado');
                    $("#dtNascSolicitante").removeClass('marcado');
                    $("#matriculaSolicitante").removeClass('marcado');
                    $("#nomeUsuario").removeClass('marcado');                    
                    limpa_form();
                    return false;
                }
        
            }
    
            $(document).ready(function() {
                $('input[type=text], textarea').focus(function() {
                    $(this).addClass('marcado');
                });
                $('input[type=text], textarea').blur(function() {
                    $(this).removeClass('marcado');
                });
            }); 
    
            $(document).ready(function() {
                validacao = $("#formSolicitante").validate({
                    rules: {
                        nomeSolicitante: {nome: 5},
                        emailSolicitante: {email: true},
                        dtNascSolicitante: {dtnasc: true},
                        matriculaSolicitante: {matricula: 5},
                        nomeUsuario: {usuario: 4},
                        senhaUsuario: {senha: 6}
                
                    },
                    messages: {
                        nomeSolicitante: { nome: "&nbsp;M�nimo de 5 caracteres!"},
                        emailSolicitante: { email: '&nbsp;Email inv�lido!'},
                        dtNascSolicitante: { dtnasc: '&nbsp;Data de Nascimento inv�lida!'},
                        matriculaSolicitante: { matricula: '&nbsp;Matricula inv�lida!'},
                        nomeUsuario: { usuario: "&nbsp;M�nimo de 4 caracteres!"},
                        senhaUsuario: { senha: "&nbsp;M�nimo de 5 caracteres!"}
                    },
                    submitHandler:function(form) {
                        alert('ok');
                    }
                });
                $("#dtNascSolicitante").mask("9?9/99/9999");
	
            });
       
            function limparValidacao()
            {
                validacao.resetForm();
            }  
    
    
        </script>
        <script>
            // initialise plugins
            jQuery(function(){
                jQuery('ul.sf-menu').superfish();
            });

        </script>
        <script type="text/javascript" language="JavaScript">
            function dataHora(){
                momento = new Date()
                var ano = momento.getYear()
                var diasemana = momento.getDay()
                var mes = momento.getMonth()
                var diadomes = momento.getDate()
                                
                               
                hora = momento.getHours()
                minuto = momento.getMinutes()
                segundo = momento.getSeconds()

                //Formatando a hora, transforma os min/segs/hora em string, se for menor igual a 1 ele acrescenta um 0
                string_segundo = new String (segundo)
                if (string_segundo.length == 1)
                    segundo = "0" + segundo

                string_minuto = new String (minuto)
                if (string_minuto.length == 1)
                    minuto = "0" + minuto

                string_hora = new String (hora)
                if (string_hora.length == 1)
                    hora = "0" + hora

                //Formatando Data
                if (ano<2000)
                    ano += (ano < 1900) ? 1900 : 0

                if (diadomes<10)
                    diadomes="0"+diadomes

                var arrayDiadaSemana = new Array("Domingo","Segunda-feira","Ter�a-feira","Quarta-feira","Quinta-feira","Sexta-feira","S�bado")
                var arrayMes = new Array(" de Janeiro de "," de Fevereiro de "," de Mar�o de ","de Abril de ","de Maio de ","de Junho de","de Julho de ","de Agosto de ","de Setembro de "," de Outubro de "," de Novembro de "," de Dezembro de ")

                //Imprimindo a hora
                Imprimir = arrayDiadaSemana[diasemana]+ ", "+ diadomes +" "+arrayMes[mes]+ano + " - " +hora + ":" + minuto + ":" +segundo;
                document.form_relogio.relogio.value = Imprimir

                setTimeout("dataHora()",1000)
            }
        </script>
        <noscript>Habilite o Javascript para visualizar esta p�gina corretamente...</noscript>
    </head>
    <body onload="dataHora();carregando()">
        <!--div's do cabecalho-->
        <div id="box"> <!-- Inicio div box-->
            <?php
            require_once ("../topo.php");
            ?>
            <!--div's do conteudo-->
            <div id="boxcaixabaixo">                
                <?php
                require_once ("../menu.php");
                require_once ("../ondeestou.php");
                ?>
                <div id="boxbaixo"> <!--Inicio div boxbaixo--> 
                    <?php
                    require_once ("../menulateral.php");
                    ?>
                    <div id="boxconteudo">
                        <h1>Cadastro de Usuario</h1>
                        <div id="boxcadastro">                            	
                            <form id="formSolicitante" action="#" method="POST" class="form">
                                <fieldset>
                                    <label class="nomeSolicitante" for="nomeSolicitante">
                                        Solicitante:
                                        <input class="nomeSolicitante" id="nomeSolicitante" type="text" name="nomeSolicitante" size="25" />              
                                    </label>   
                                                                     
                                </fieldset>

                                <fieldset>
                                    <label class="emailSolicitante" for="emailSolicitante">
                                        Email:
                                        <input class="emailSolicitante" id="emailSolicitante" type="text" name="cnpjFornecedor" size="25">   
                                    </label> 
                                    <label class="matriculaSolicitante" for="matriculaSolicitante">
                                        Matricula:
                                        <input class="matriculaSolicitante" id="matriculaSolicitante" type="text" name="foneFornecedor" size="25" />  
                                    </label> 
                                    <label class="dtNascSolicitante" for="dtNascSolicitante">
                                        Data de Nascimento:
                                        <input class="dtNascSolicitante" id="dtNascSolicitante" type="text" name="contato" size="25" /> 
                                    </label>  
                                </fieldset>
                                <fieldset>
                                    <label class="nomeUsuario" for="nomeUsuario">
                                        Nome de Usuário:
                                        <input class="nomeUsuario" id="nomeUsuario" type="text" name="foneFornecedor" size="25" />  
                                    </label>  
                                    <label class="senhaUsuario" for="senhaUsuario">
                                        Senha(Mínimo 6 caracteres):
                                        <input class="senhaUsuario" id="senhaUsuario" type="password" name="foneFornecedor" size="25" />  
                                    </label>  
                                </fieldset>
                                <input type="button" id="botao" value="Salvar" onClick=valida_form() class="botoesInput" />
                                <input type="button" id="limpar" value="Limpar" onClick="limpa_form();limparValidacao();" class="botoesInput" />
                                <input type="hidden" id="acao" value="" />
                            </form>
                        </div>


                        <script src="../js/jquery/jquery.tablesorter.js"></script>
                        <script src="../js/jquery/jquery.tablesorter.pager.js"></script>
                        <script src="../js/jquery/jquery.tablesorter.filter.js"></script>

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

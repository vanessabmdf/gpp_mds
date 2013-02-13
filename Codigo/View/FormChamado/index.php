<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>HelpDesk - Faculdade UnB Gama</title>
        <link href="../css/layout.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/superfish.css" media="screen" />
        <link href="../css/examples.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/blue/style.css" type="text/css" media="print, projection, screen" />
        <link href="../css/layoutform.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/formChamado.css" rel="stylesheet" type="text/css" media="screen" />


        <script src="../js/jquery/jquery-1.8.3.min.js"></script> 
        <script src="../js/jquery/jquery.validate.js"></script>
        <script src="../js/jquery/jquery-impromptu.3.1.js"></script>
        <script src="../js/jquery/jquery.maskedimput-1.3.js"></script>
        <script src="../js/jquery/jquery.limit-1.2.js"></script>
        <script src="../js/jquery/jquery.blockUI.js"></script>
        <script src="../js/hoverIntent.js"></script>
        <script src="../js/superfish.js"></script>
        <script src="../js/jquery/customSelect.jquery.min.js"></script>

        <script src="js/site.js"></script>
        
        <script type="text/javascript">
             $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg != value;
             }, "Value must not equal arg.");
             
            $(document).ready(function() {
                validacao = $("#formChamado").validate({
                    rules: {
                        local:{
                            required: true,
                            minlength: 2
                        },
                        descricao:{
                            required: true,
                            minlength: 12
                        },
                        tipoChamado: { 
                            valueNotEquals: "default" 
                        }
                
                    },
                    messages: {
                        local:{
                            required: "Digite o local do ocorrido",
                            minlength: "Minimo 2 caracteres"
                        },
                         descricao:{
                            required: "Forneça uma descrição do problema",
                            minlength: "Mínimo 12 caracteres"
                        },
                        tipoChamado: {
                            valueNotEquals: "Selecione um tipo"
                        }
                        
                        
                        
                        
                    }
                    
                });
	
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

                var arrayDiadaSemana = new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado")
                var arrayMes = new Array(" de Janeiro de "," de Fevereiro de "," de Março de ","de Abril de ","de Maio de ","de Junho de","de Julho de ","de Agosto de ","de Setembro de "," de Outubro de "," de Novembro de "," de Dezembro de ")

                //Imprimindo a hora
                Imprimir = arrayDiadaSemana[diasemana]+ ", "+ diadomes +" "+arrayMes[mes]+ano + " - " +hora + ":" + minuto + ":" +segundo;
                document.form_relogio.relogio.value = Imprimir

                setTimeout("dataHora()",1000)
            }
        </script>
        
        <script type="text/javascript">
        $(function(){
            $('#tipoChamado').customSelect();
        });
        </script>
       
        <noscript>Habilite o Javascript para visualizar esta página corretamente...</noscript>
        

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
                        <h1>Cadastro de Chamados</h1>
                        <div id="boxcadastro">                            	
                            <form id="formChamado" action="#" method="POST" class="form">
                              <fieldset>
                                <label for="local" style="margin-top: 5px;">Local do Equipamento</label>
                                <input type="text" name="local" id="local" class="campo" size="40"/><br /><br />
                                
                                <!--<input type="text" name="codEquipamento" id="codEquipamento"/>-->
                  
                                    <label>
                                        Tipo de Chamado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <select id="tipoChamado" name="tipoChamado">
                                                
                                                    <option value="0" selected>selecione</option>
                                                    <option value="1">Periféricos do Computador</option>
                                                    <option value="2">Projetores</option>
                                            </select>
                                    </label>                                   
                                </fieldset>
                                <fieldset>
                                    <br /><br /><span style="font-size: 12px;"> Descrição</span>
                                        <textarea name="descricao" class="descricao" rows="15" cols="125"></textarea>
                                        <span class="contagemLetras"></span>
                                </fieldset>
                                <div id="botoes">
                                    <input type="submit" id="botao" value="REALIZAR CHAMADO" class="botaoCadastro botaoCadastro-blue" />
                                    <input type="reset" id="limpar" value="Limpar" class="botaoCadastro botaoCadastro-green" />
                                </div>
                                <input type="hidden" id="acao" value="" />
                            </form>
                        </div>


                       

                       
                    </div>
                </div> <!--fim div boxbaixo -->

            </div>  	
        </div> <!-- fim div box-->
    </body>
</html>

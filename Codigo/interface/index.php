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
        <title>GTI - Sistema de Gestão de Serviços de TI</title>
        <link href="css/layout.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/superfish.css" media="screen" />
        <script type="text/javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/hoverIntent.js"></script>
        <script type="text/javascript" src="js/superfish.js"></script>
        <script type="text/javascript">

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
        <noscript>Habilite o Javascript para visualizar esta página corretamente...</noscript>
    </head>
    <body onload="dataHora()">
        <!--div's do cabecalho-->
        <div id="box"> <!-- Inicio div box-->
            <div id="topo">	<!-- Inicio div topo-->
                <div id="banner"> <!-- Inicio div banner-->
                </div> <!-- fim div banner-->
                <div id="controles"> <!-- inicio div controles -->
                    <div id="datahora"> <!--Inicio div datahora-->
                        <form action=""  name="form_relogio" >
                            <input type="text"  size="48" name="relogio" ReadOnly/>
                        </form>
                    </div> <!-- fim div datahora-->
                    <div id="controllogin"> <!--Inicio div controllogin-->
                        <div class="controlusuario">
                            <b>Usuário: Luiz Fernando de Freitas Matos</b>
                        </div>
                        <div class="controlperfil">
                            <b>Perfil: Administrador</b>
                        </div>
                    </div> <!-- fim div contrologin-->
                </div>	<!-- fim div controles-->
            </div> <!-- fim div topo-->       
            <!--div's do conteudo-->
            <div id="boxcaixabaixo">
                <div id="menu"> <!--Inicio div menu-->
                    <ul class="sf-menu">
                        <li class="current">
                            <a href="#a">Cadastrar</a>
                            <ul>
                                <li>
                                    <a href="../gti/FormFornecedor/index.php">Fornecedor</a>
                                </li>
                                <li class="current">
                                    <a href="../gti/FormMarca/index.php">Marca</a>
                                </li>
                                <li>
                                    <a href="../gti/FormPredio/index.php">Prédio</a>
                                </li>
                                <li>
                                    <a href="../gti/FormTipo/index.php">Tipo</a>
                                </li>
                                <li>
                                    <a href="../gti/FormUnidade/index.php">Unidade</a>
                                </li>
                                <li>
                                    <a href="../gti/FormLocalizacao/index.php">Localização física</a>
                                </li>
                                <li>
                                    <a href="../gti/FormComponente/index.php">Componente</a>
                                </li>
                                <li>
                                    <a href="../gti/FormModelo/index.php">Modelo Periférico</a>
                                </li>
                                <li>
                                    <a href="../gti/FormModeloMicro/index.php">Modelo Micro</a>
                                </li>
                                <li>
                                    <a href="../gti/FormOrigemAquisicao/index.php">Origem Aquisição</a>
                                </li>
                                <li>
                                    <a href="../gti/FormCPeriferico/index.php">Complemento Periférico</a>
                                </li>
								<li>
                                    <a href="../gti/FormNotaFiscal/index.php">Nota Fiscal</a>
                                </li>
								<li>
                                    <a href="../gti/FormProcessoAquisicao/index.php">Processo Aquisição</a>
                                </li>
								<li>
                                    <a href="../gti/FormTipoAquisicao/index.php">Tipo Aquisição</a>
                                </li>
								<li>
                                    <a href="../gti/FormTipoUnidade/index.php">Tipo Unidade</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Visualizar</a>
                        </li>
                        <li>
                            <a href="#">Consultar</a>
                            <ul>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Histórico</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Histórico</a>
                            <ul>

                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Relatórios</a>
                            <ul>

                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Contatos</a>
                            <ul>

                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Contatos</a>
                            <ul>

                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>					
                        <li>
                            <a href="#">Contatos</a>
                            <ul>

                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>
                                        <li><a href="#">short</a></li>

                                        <li><a href="#">short</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>

                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>

                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>

                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                                <li>

                                    <a href="#">menu item</a>
                                    <ul>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                        <li><a href="#">menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Final do menu</a>
                        </li>	
                    </ul>
                </div> <!--Inicio div menu-->
                <div id="ondeestou"> <!--Inicio div ondeestou-->
                    <p>Onde estou: <b> Gerência de Equipamentos > Cadastro de Equipamento</b></p>
                </div> <!--fim div ondestou -->

                <div id="boxbaixo"> <!--Inicio div boxbaixo-->
                    <div id="menuesquerda">
                        <div id="caixacontrole1">    
                            <h3>Ger. de Equipamentos</h3>
                            <ul>                         
                                <li> Cad. de Equipamento </li>
                                <li> Mov. de Equipamento </li>
                                <li> Rel. de Equipamento </li>
                                <li> Cad. de Aquisição </li>                                
                            </ul>
                            <h3>Gerência de Demandas</h3>
                            <ul>
                                <li> Ger. de Atendimentos </li>
                                <li> Enc. de Demanda </li>
                                <li> Baixa de Demanda </li>
                                <li> Rel. de Demanda </li>
                            </ul>
                        </div>
                        <div id="caixacontrole2">     
                            <h3> Lembretes </h3>   
                            <marquee direction="up" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                            <ul>
                                <li> Verificar andamento da OS 210.04.2011 </li>
                                <li> Providenciar distribuições dos equipamentos novos</li>
                                <li> Reunião técnica às 16h </li>
                            </ul>
                            </marquee>
                        </div>
                    </div>
                    <div id="boxconteudo">
                    </div>
                </div> <!--fim div boxbaixo -->

                <div id="clear"></div> <!--Inicio e fim da div clear-->
            </div>  	
        </div> <!-- fim div box-->
    </body>
</html>
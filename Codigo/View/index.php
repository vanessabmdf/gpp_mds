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
    <body onload="dataHora()">
        <!--div's do cabecalho-->
        <div id="box"> <!-- Inicio div box-->
            <?php
            require_once ("topo.php");
            ?>     
            <!--div's do conteudo-->
            <div id="boxcaixabaixo">
                <?php
                require_once ("menuprincipal.php");
                require_once ("ondeestou.php");
                ?>

                <div id="boxbaixo"> <!--Inicio div boxbaixo-->
                    <?php
                    require_once ("menulateral.php");
                    ?>
                    <div id="boxconteudo">
                    </div>
                </div> <!--fim div boxbaixo -->

                <div id="clear"></div> <!--Inicio e fim da div clear-->
            </div>  	
        </div> <!-- fim div box-->
    </body>
</html>
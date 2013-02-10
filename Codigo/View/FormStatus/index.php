<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?
//pegar a url atual com variaveis de ambiente
$server = $_SERVER['SERVER_NAME'];
$endereco = $_SERVER ['REQUEST_URI'];
//echo "http://" . $server . $endereco;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                        <h1>Cadastro de Status</h1>
                        <div id="boxcadastro">                            	
                            <form id="formSTATUS" action="#" method="POST" class="form">
                                
                                <fieldset>
                                    <label>
                                        Descrição:
                                        <input class="descricao" id="descricao" type="text" name="descricao" size="25"/>
                                    </label>   
                                </fieldset>
                                <input type="button" id="botao" value="Salvar" onClick="enviar();" class="botoesInput" />
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

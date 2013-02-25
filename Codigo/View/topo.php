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
                    <b>Bem-vindo(a), <?php echo  $_COOKIE['nome_usuario']; ?></b>
                </div>
                <div class="controlperfil">
                    <b><?php echo $_COOKIE['perfil_usuario']; ?> </b>
                </div>
            </div> <!-- fim div contrologin-->
           <?php
            if($_COOKIE['perfil_usuario']=='Solicitante')
                echo '<a href="SolicitanteView/FormChamado/index.php"><button class="botao botao-green">voltar</button></a>';
            elseif($_COOKIE['perfil_usuario']=='Técnico')
                echo '<a href="TecnicoView/FormChamado/index.php"><button class="botao botao-green">voltar</button></a>';
            elseif($_COOKIE['perfil_usuario']=='Gerente')
                echo '<a href="GerenteView/FormChamado/index.php"><button class="botao botao-green">voltar</button></a>';
           ?>
        </div>	<!-- fim div controles-->
    </div> <!-- fim div topo-->  
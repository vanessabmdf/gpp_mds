<div id="boxlogin">
    <form method="POST" action="" id="formLogin">
        <fieldset>
        <p align="center">
        <label for="nomeLogin">Nome de usuário</label><br />
        <input type="text" name="nomeLogin" size="28" class="campo" id="nomeLogin"/><br />
        <label for="senhaSenha">Senha</label><br />
        <input type="password" name="senhaLogin" size="28" class="campo" id="senhaLogin" /><br /><br /><br />
        <input type="submit" value="ENTRAR" name="enviar" class="botaoCadastro botaoCadastro-blue" id="fecha-cadastro" onclick="limpaValidacaoCadastro();"/><br /><br /><br />
        </p>
        </fieldset>
    </form>
    <p align="center">
        <a href="recuperar_conta.php">Não consegue acessar a sua conta?</a> <!-- COLOCAR AQUI PÁGINA PARA RECUPERAÇÃO DE SENHA-->
    </p>
   
    <?php include 'login/login.php'; ?>
    
</div>
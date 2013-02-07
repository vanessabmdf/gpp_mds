<div id="cadastro">
    <h1 class="painelesquerdo">Cadastro</h1>

    <form method="POST" action="../../Codigo/View/login/novaconta.php" class="cadastro">
        <label for="nome" class="cadastro">Nome</label><br />
        <input type="text" name="nome" size="28" class="campo" /><br />
        <label for="email" class="cadastro">E-mail</label><br />
        <input type="text" name="email" size="28" class="campo" /><br />
        <label for="emailConfirma" class="cadastro">Confirma e-mail</label><br />
        <input type="text" name="emailConfirma" size="28" class="campo" /><br />
        <label for="nome" class="cadastro">Matrícula</label><br />
        <input type="text" name="matricula" size="28" class="campo" /><br />
        <label for="nomeCadastro" class="cadastro">Nome de usuário</label><br />
        <input type="text" name="loginUsuario" size="28" class="campo" /><br />
        <label for="senhaCadastro" class="cadastro">Senha</label><br />
        <input type="password" name="senhaCadastro" size="28" class="campo" /><br />
        <label for="senhaCadastroConfirma" class="cadastro">Confirma senha</label><br />
        <input type="password" name="senhaCadastroConfirma" size="28" class="campo" /><br /><br />

        <input type="button" name="cancelarCadastro" value="CANCELAR" id ="cancela-cadastro" class="botaoCadastro botaoCadastro-green"/>
        <input type="submit" name="cadastrar" value="CADASTRAR" class="botaoCadastro botaoCadastro-blue"/>
    </form>
</div>

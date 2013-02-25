<div id="cadastro">
    <h1 class="painelesquerdo">Cadastro</h1>
    
    

    <form onsubmit="validaForm();" class="cadastro" id="formCadastro" name="formCadastro">
        <label for="nome" class="cadastro">Nome</label><br />
        <input type="text" name="nomeUsuario" size="28" class="campo" id="nomeUsuario"/><br />
        <label for="email" class="cadastro">E-mail</label><br />
        <input type="text" name="emailUsuario" size="28" class="campo" id="emailUsuario"/><br />
        <label for="emailConfirma" class="cadastro">Confirma e-mail</label><br />
        <input type="text" name="confirmaEmail" size="28" class="campo" id="confirmaEmail"/><br />
        <label for="nome" class="cadastro">Matrícula</label><br />
        <input type="text" name="matriculaUsuario" size="28" class="campo" id="matriculaUsuario"/><br />
        <label for="nomeCadastro" class="cadastro">Nome de usuário</label><br />
        <input type="text" name="loginUsuario" size="28" class="campo" id="loginUsuario"/><br />
        <label for="senhaCadastro" class="cadastro">Senha</label><br />
        <input type="password" name="senhaUsuario" size="28" maxlength="8" class="campo" id="senhaUsuario"/><br />
        <label for="senhaCadastroConfirma" class="cadastro">Confirma senha</label><br />
        <input type="password" name="confirmaSenha" size="28" maxlength="8" class="campo" id="confirmaSenha"/><br /><br />
        
        
        <input type="button" name="cancelarCadastro" value="CANCELAR" id ="cancela-cadastro" class="botaoCadastro botaoCadastro-green" onclick="limpaValidacaoCadastro();limpaForm();"/>
        <input type="submit" name="cadastrar" value="CADASTRAR" class="botaoCadastro botaoCadastro-blue" />
    </form>
</div>

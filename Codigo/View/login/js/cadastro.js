function validaForm() {
    if($("#formCadastro").valid()){
        with (document.formCadastro){
            method = 'POST';
            action = "../../Codigo/View/login/cadastro.php";
            promptConfirma();  
        }
        function promptConfirma(){
            var confirmar = {
                confirmacao: {	                            
                    html:'<span style="font-size:14px; font-weight: normal;">Cadastrado com sucesso!</span>',	
                    buttons: {Ok: 0},
                    focus: 0,
                    submit:function(v){
                        if(v==0){
                            
                            $.prompt.close();
                            
                        }
                        $("#nomeUsuario").focus();
                    }
                }
            };
            $.prompt(confirmar, {timeout: 10000});
        }
    }
}

function limpaForm(){
    $("#nomeUsuario").val("");
    $("#emailUsuario").val("");
    $("#confirmaEmail").val("");
    $("#matriculaUsuario").val("");
    $("#loginUsuario").val("");
    $("#senhaUsuario").val("");
    $("#confirmaSenha").val("");
 }

function limpaLogin(){
    $("#nomeLogin").val("");
    $("#senhaLogin").val("");
    
}


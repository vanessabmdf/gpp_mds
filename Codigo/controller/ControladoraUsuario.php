<?php

include '../NewModel/UsuarioAcoes.php';

class ControladoraUsuario 
{
    private $usuarioAcoes;
    
    //Cria o objeto da classe UsuarioAcoes, que vai realizar os metodos necessarios.
    function __construct() 
    {
        $this->usuarioAcoes = new UsuarioAcoes();
    }
    
    
    /*Nao sei como funciona a interface ainda, mas no momento em que o usuario
     * clicar em SALVAR la no cadastro de solicitante, ai a interface vai chamar esse metodo aqui:
     */
    public function chamarCadastroUsuario(/*Aqui vao ter as variaveis que receberao os dados informados.*/)
    {
        //Chama o metodo cadastrarUsuario da classe UsuarioAcoes.
        $this->usuarioAcoes->cadastrarUsuario($tipo, $senha, $nome, $email, $matricula, $data_nascimento);
    }
    
}

?>

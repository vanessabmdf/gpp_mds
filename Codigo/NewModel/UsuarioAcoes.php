<?php

include '../NewModel/Usuario.php';
include '../DAO/UsuarioDAO.php';

class UsuarioAcoes 
{
    
    function __construct() {
    }


    public function cadastrarUsuario($tipo, $senha, $nome, $email, $matricula, $data_nascimento)
    {   
        //Cria o objeto da classe UsuarioDao para inserir no banco de dados.
        $usuarioDAO = new UsuarioDAO();
        //Falta inserir um metodo pra buscar o ultimo codigo de usuario no banco de dados.
        
        
        //Solicitante é usuario tipo 1.
        //Tecnico é usuario tipo 2. So o gerente que cadastra Tecnico.
        if($tipo == 1)
            $usuario = new Usuario($codigo,"Solicitante", $senha, $nome, $email, $matricula, $data_nascimento);
        
        if($tipo == 2)
            $usuario = new Usuario($codigo,"Tecnico", $senha, $nome, $email, $matricula, $data_nascimento);
        
        //Insere o usuario no banco de dados.
        $usuarioDAO->inserirUsuario($usuario);
        $usuarioDAO->fechaConexão();
    }
    
    
}

?>

<?php
require_once "/../DAO/UsuarioDAO.php";
require_once "/../Model/Usuario.php";

/**
 * Description of UsuarioCtrl
 *
 * @author Luiz
 */
class UsuarioCtrl {
   
    public function insUsuario($login, $senha, $email, $nome, $matricula, $perfil_cod) 
    {
                $usuario = new Usuario($perfil_cod ,$login, $senha, $nome, $email, $matricula);

                $DAO = new UsuarioDAO();
                $resultado = $DAO->inserirUsuario($usuario);
                $DAO->fechaConexao();
                return $resultado;
    }

    public function delUsuario($login) 
    {
                $DAO = new UsuarioDAO();
                $resultado = $DAO->deletarUsuario($login);
                $DAO->fechaConexao();
                return $resultado;
    }
    
    public function listaUsuario() 
    {
                $DAO = new UsuarioDAO();
                $lista = $DAO->obterUsuario();
                $DAO->fechaConexao();
                return $lista;
    }
    
    public function alteraUsuario($login, $senha, $email, $nome, $matricula, $codigo, $login_busca) 
    {     
                $usuario = new Usuario($codigo, $login, $senha, $nome, $email, $matricula);
            
                $DAO = new UsuarioDAO();
                $resultado = $DAO->alterarUsuario($usuario, $login_busca);
                $DAO->fechaConexao();
                return $resultado;
    }
    
    public function obterUsuario_Especifico($login)
    {
                $DAO = new UsuarioDAO();
                $usuario = $DAO->obterUsuario_Especifico($login);
                $DAO->fechaConexao();
                return $usuario;
    }
    
    public function getNumCols() 
    {
                $DAO = new UsuarioDAO();
                $col = $DAO->numColUsuario();
                $DAO->fechaConexao();
                return $col;
    }
    
    public function validaLogin($login, $senha)
    {
                $DAO = new UsuarioDAO();
                $linhas = $DAO->valida_login($login, $senha);
                $DAO->fechaConexao();
                return $linhas;
    }
    
    public function validaLoginCadastro($login)
    {
                $DAO = new UsuarioDAO();
                $linhas = $DAO->validaLoginCadastro($login);
                $DAO->fechaConexao();
                return $linhas;
    }
    
    public function verificalogin($login)
    {
                $DAO = new UsuarioDAO();
                $perfil_cod = $DAO->verificaLogin($login);
                return $perfil_cod;
    }
}
?>

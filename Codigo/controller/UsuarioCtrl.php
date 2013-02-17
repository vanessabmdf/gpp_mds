<?php
require_once "/../DAO/UsuarioDAO.php";
require_once "/../Model/Usuario.php";

/**
 * Description of UsuarioCtrl
 *
 * @author Luiz
 */
class UsuarioCtrl {
   
    public function insUsuario($login, $senha, $email, $nome, $matricula, $perfil_cod) {
        try {
                $usuario = new Usuario($perfil_cod ,$login, $senha, $nome, $email, $matricula);

                $DAO = new UsuarioDAO();
                $resultado = $DAO->inserirUsuario($usuario);
                $DAO->fechaConexao();
                return $resultado;
            } catch (Exception $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }

    public function delUsuario($login) {
        try {
                $DAO = new UsuarioDAO();
                $resultado = $DAO->deletarUsuario($login);
                $DAO->fechaConexao();
                return $resultado;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function listaUsuario() {
        try {
                $DAO = new UsuarioDAO();
                $lista = $DAO->obterUsuario();
                $DAO->fechaConexao();
                return $lista;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
        public function alteraUsuario($login, $senha, $email, $nome, $matricula, $codigo, $login_busca) {
        try {     
                $usuario = new Usuario($codigo, $login, $senha, $nome, $email, $matricula);
            
                $DAO = new UsuarioDAO();
                $resultado = $DAO->alterarUsuario($usuario, $login_busca);
                $DAO->fechaConexao();
                return $resultado;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function obterUsuario_Especifico($login)
    {
       $DAO = new UsuarioDAO();
       $usuario = $DAO->obterUsuario_Especifico($login);
       $DAO->fechaConexao();
       return $usuario;
    }
    
    public function getNumCols() {
        try {
            $DAO = new UsuarioDAO();
            $col = $DAO->numColUsuario();
            $DAO->fechaConexao();
            return $col;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function validaLogin($login, $senha){
        try{
            $DAO = new UsuarioDAO();
            $linhas = $DAO->valida_login($login, $senha);
            $DAO->fechaConexao();
            return $linhas;
            
        }  catch (Exception $erro){
            return "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function validaLoginCadastro($login){
        try{
            $DAO = new UsuarioDAO();
            $linhas = $DAO->validaLoginCadastro($login);
            $DAO->fechaConexao();
            return $linhas;
        } catch(Exception $erro){
            return "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
        
    }
    
    public function verificalogin($login){
        try{
            $DAO = new UsuarioDAO();
            $perfil_cod = $DAO->verificaLogin($login);
            return $perfil_cod;
        }catch(Exception $erro){
             return "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}
?>

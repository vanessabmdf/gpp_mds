<?php
require_once "/../DAO/UsuarioDAO.php";
require_once "/../model/Usuario.class.php";

/**
 * Description of UsuarioCtrl
 *
 * @author Luiz
 */
class UsuarioCtrl {

    private $DAO;
    /*
    public function UsuarioDAO() {
        $this->DAO = new UsuarioDAO();
    }
    */
   
    public function instUsuario($nome, $email, $matricula, $dataNascimento, $login, $senha) {
        try {
            $usuario = new Usuario();
            $usuario = new Usuario();

            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setMatricula($matricula);
            $usuario->setData($dataNascimento);
            $usuario->setNomeUsuario($login);
            $usuario->setSenhaUsuario($senha);
            $DAO = new UsuarioDAO();
            $DAO->insereUsuario($usuario);
            $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function delUsuario($codigoUsuario) {
        try {
            $DAO = new UsuarioDAO();
            $DAO->deleteUsuario($codigoUsuario);
            $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function listaUsuario() {
        try {
            $DAO = new UsuarioDAO();
            $lista = $DAO->obterUsuario();
            $DAO->fechaConexão();
            return $lista;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
        public function alteraUsuario($nome, $email, $matricula, $dataNascimento, $login, $senha, $codigo) {
        try {     
            $usuario = new Usuario();
            
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setMatricula($matricula);
            $usuario->setData($dataNascimento);
            $usuario->setNomeUsuario($login);
            $usuario->setSenhaUsuario($senha);
            
            $DAO = new UsuarioDAO();
            $DAO->alteraUsuario($usuario, $codigo);
            $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
     public function getNumCols() {
        try {
            $DAO = new UsuarioDAO();
            $col = $DAO->numColUsuario();
            $DAO->fechaConexão();
            return $col;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

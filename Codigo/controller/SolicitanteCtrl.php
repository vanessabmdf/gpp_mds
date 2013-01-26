<?php
require_once "/../DAO/SolicitanteDAO.php";
require_once "/../NewModel/Solicitante.class.php";
require_once "/../NewModel/Usuario.class.php";

/**
 * Description of SolicitanteCtrl
 *
 * @author Luiz
 */
class SolicitanteCtrl {

    private $DAO;
    /*
    public function SolicitanteDAO() {
        $this->DAO = new SolicitanteDAO();
    }
    */
   
    public function instSolicitante($nomeSolicitante, $email, $matricula, $dataNascimento, $nomeUsuario, $senhaUsuario) {
        try {
            $solicitante = new Solicitante();
            $usuario = new Usuario();

            $solicitante->setNome($nomeSolicitante);
            $solicitante->setEmail($email);
            $solicitante->setMatricula($matricula);
            $solicitante->setData($dataNascimento);
            $solicitante->setNomeUsuario($nomeUsuario);
            $solicitante->setSenhaUsuario($senhaUsuario);
            $DAO = new SolicitanteDAO();
            $DAO->insereSolicitante($solicitante);
            $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function delSolicitante($codigoSolicitante) {
        try {
            $DAO = new SolicitanteDAO();
            $DAO->deleteSolicitante($codigoSolicitante);
            $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function listaSolicitante() {
        try {
            $DAO = new SolicitanteDAO();
            $lista = $DAO->obterSolicitante();
            $DAO->fechaConexão();
            return $lista;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
        public function alteraSolicitante($nomeSolicitante, $email, $matricula, $dataNascimento, $nomeUsuario, $senhaUsuario, $codigo) {
        try {     
            $solicitante = new Solicitante();
            
            $solicitante->setNome($nomeSolicitante);
            $solicitante->setEmail($email);
            $solicitante->setMatricula($matricula);
            $solicitante->setData($dataNascimento);
            $solicitante->setNomeUsuario($nomeUsuario);
            $solicitante->setSenhaUsuario($senhaUsuario);
            
            $DAO = new SolicitanteDAO();
            $DAO->alteraSolicitante($solicitante, $codigo);
            $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
     public function getNumCols() {
        try {
            $DAO = new SolicitanteDAO();
            $col = $DAO->numColSolicitante();
            $DAO->fechaConexão();
            return $col;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

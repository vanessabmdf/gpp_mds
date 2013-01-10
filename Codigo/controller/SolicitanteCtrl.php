<?php

require_once "../lib/Conection.php";
require_once "../model/Solicitante.class.php";
require_once "../model/Usuario.class.php";

/**
 * Description of SolicitanteCtrl
 *
 * @author Luiz
 */
class SolicitanteCtrl {

    private $DAO;

    public function SolicitanteDAO() {
        $this->DAO = new SolicitanteDAO();
    }

    //put your function
    public function instSolicitante($nomeSolicitante, $email, $matricula, $dataNascimento, $nomeUsuario, $senhaUsuario) {
        try {
            $solicitante = new Solicitante();
            $usuario = new Usuario();

            $solicitante->setNome($nomeSolicitante);
            $solicitante->setEmail($email);
            $solicitante->setMatricula($matricula);
            $solicitante->setData($dataNascimento);
            $usuario->setNome($nomeUsuario);
            $usuario->setSenha($senhaUsuario);

            $this->DAO->insereSolicitante($solicitante, $usuario);
            $this->DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function delSolicitante($codigoSolicitante) {
        try {
            
            $this->DAO->deleteSolicitante($codigoSolicitante);
            $this->DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

}

?>

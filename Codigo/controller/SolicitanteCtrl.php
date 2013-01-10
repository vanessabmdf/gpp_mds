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

    //put your function
    public function instSolicitante($nomeSolicitante, $email, $matricula, $dataNascimento, $nomeUsuario, $senhaUsuario) {

        $solicitante = new Solicitante();
        $usuario = new Usuario();
        
        $solicitante->setNome($nomeSolicitante);
        $solicitante->setEmail($email);
        $solicitante->setMatricula($matricula);
        $solicitante->setData($dataNascimento);
        $usuario->setNome($nomeUsuario);
        $usuario->setSenha($senhaUsuario);
        
        $DAO = new SolicitanteDAO();
        $DAO->insereSolicitante($solicitante, $usuario);
        $DAO->fechaConexão();
    }



}

?>

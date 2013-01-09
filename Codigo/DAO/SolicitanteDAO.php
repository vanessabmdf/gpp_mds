<?php

require_once "../lib/Conection.php";
require_once "../model/Solicitante.class.php";

class SolicitanteDAO {

    private $con; 
    public function SolicitanteDAO(){
        $this->con = new Conection();
        //Função para aparecer os erros
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insereSolicitante(Solicitante $solicitante, Usuario $usuario) {
        try{
            /*Sem passagem por referência
            $nome = $solicitante->getNome();
            $email = $solicitante->getEmail();
            $matricula = $solicitante->getMatricula();
            $data = $solicitante->getData();
            */
            $stm = $this->con->prepare("INSERT INTO solicitante (nome, email, matricula, data_nascimento) 
                                  VALUES (:nome, :email, :matricula, :data_nascimento)");
            $stm->bindParam(":nome",$solicitante->getNome());
            $stm->bindParam(":email",$solicitante->getEmail());
            $stm->bindParam(":matricula",$solicitante->getMatricula());
            $stm->bindParam(":data_nascimento",$solicitante->getData());
            $exec = $stm->execute();
            $this->con->null;
        }catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: ". $erro->getMessage();           
        }        
    }

}

?>

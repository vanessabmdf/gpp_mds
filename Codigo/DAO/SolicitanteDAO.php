<?php

require_once "../lib/Conection.php";
require_once "../model/Solicitante.class.php";

class SolicitanteDAO {

    private $con; 
    public function SolicitanteDAO(){
        $this->con = new Conexao();
        //Função para aparecer os erros
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insereSolicitante(Solicitante $solicitante, Usuario $usuario) {
        try{
            $stm = $con->prepare("INSERT INTO solicitante (nome, email, matricula, codigo, data_nascimento) 
                                  VALUES (:nome, :email, :matricula, :codigo, :data_nascimento)");
            $stm->bindParam(":nome",$solicitante->getNome());
            $stm->bindParam(":nome",$solicitante->getEmail());
            $stm->bindParam(":nome",$solicitante->getMatricula());
            $stm->bindParam(":nome",$solicitante->getCodigo());
            $stm->bindParam(":nome",$solicitante->getData_Nascimento());
            $exec = $stm->execute();
            $con->null;
        }catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: ". $erro->getMessage();           
        }        
    }

}

?>
<?php

require_once "../lib/Conection.php";
require_once "../model/Solicitante.class.php";

class SolicitanteDAO {

    public $con;

    public function SolicitanteDAO() {
        $this->con = new Conection();
        //Função para aparecer os erros
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insereSolicitante(Solicitante $solicitante, Usuario $usuario) {
        try {
            /* Sem passagem por referência
              $nome = $solicitante->getNome();
              $email = $solicitante->getEmail();
              $matricula = $solicitante->getMatricula();
              $data = $solicitante->getData();
             */
            $query = "INSERT INTO solicitante (nome, email, matricula, data_nascimento) 
                      VALUES (:nome, :email, :matricula, :data_nascimento)";
            $stm = $this->con->prepare($query);
            $stm->bindParam(":nome", $solicitante->getNome());
            $stm->bindParam(":email", $solicitante->getEmail());
            $stm->bindParam(":matricula", $solicitante->getMatricula());
            $stm->bindParam(":data_nascimento", $solicitante->getData());
            $exec = $stm->execute();
            
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function alteraSolicitante(Solicitante $solicitante, Usuario $usuario, $codigo) {
        try {
            /* Sem passagem por referência
              $nome = $solicitante->getNome();
              $email = $solicitante->getEmail();
              $matricula = $solicitante->getMatricula();
              $data = $solicitante->getData();
             */
            $query = "UPDATE SET nome=:nome, email=:email, matricula:matricula, data_nascimento:data_nascimento
                      WHERE codigo = ".$codigo.""; 
                      
            $stm = $this->con->prepare($query);
            $stm->bindParam(":nome", $solicitante->getNome());
            $stm->bindParam(":email", $solicitante->getEmail());
            $stm->bindParam(":matricula", $solicitante->getMatricula());
            $stm->bindParam(":data_nascimento", $solicitante->getData());       
            $stm->execute();
            $this->con->commit();
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }


    public function obterSolicitante() {
        try {
            $stm = $this->con->query("SELECT * FROM solicitante");
            return $stm;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deleteSolicitante($codigo) {
        try {
            $stm = $this->con->query("DELETE FROM solicitante WHERE codigo = ".$codigo."");
            return $stm;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    //Função de fechar a conexão aberta no DAO
    public function fechaConexão() {
        try {
            $this->con = null;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

}

?>

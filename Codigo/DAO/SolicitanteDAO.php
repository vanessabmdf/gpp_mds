<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Solicitante.class.php";

class SolicitanteDAO {

    private $con;

    public function SolicitanteDAO() {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insereSolicitante(Solicitante $solicitante) {
        try {
            /* Sem passagem por referência
              $nome = $solicitante->getNome();
              $email = $solicitante->getEmail();
              $matricula = $solicitante->getMatricula();
              $data = $solicitante->getData();
             */
            $query = "INSERT INTO solicitante (nome, email, matricula, data_nascimento, nome_usuario, senha_usuario) 
                      VALUES (:nome, :email, :matricula, :data_nascimento, :nome_usuario, :senha_usuario)";
            $stm = $this->con->prepare($query);
            $stm->bindParam(":nome", $solicitante->getNome());
            $stm->bindParam(":email", $solicitante->getEmail());
            $stm->bindParam(":matricula", $solicitante->getMatricula());
            $stm->bindParam(":data_nascimento", $solicitante->getData());
            $stm->bindParam(":nome_usuario", $solicitante->getNomeUsuario());
            $stm->bindParam(":senha_usuario", $solicitante->getSenhaUsuario());
            $exec = $stm->execute();
             
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function alteraSolicitante(Solicitante $solicitante, $codigo) {
        try {
            /* Sem passagem por referência
              $nome = $solicitante->getNome();
              $email = $solicitante->getEmail();
              $matricula = $solicitante->getMatricula();
              $data = $solicitante->getData();
             */
            $query = "UPDATE solicitante SET nome=:nome, email=:email, matricula=:matricula, data_nascimento=:data_nascimento,
                      nome_usuario=:nome_usuario, senha_usuario=:senha_usuario
                      WHERE codigo = ".$codigo.""; 
                      
            $stm = $this->con->prepare($query);
            $stm->bindParam(":nome", $solicitante->getNome());
            $stm->bindParam(":email", $solicitante->getEmail());
            $stm->bindParam(":matricula", $solicitante->getMatricula());
            $stm->bindParam(":data_nascimento", $solicitante->getData());  
            $stm->bindParam(":nome_usuario", $solicitante->getNomeUsuario());
            $stm->bindParam(":senha_usuario", $solicitante->getSenhaUsuario());
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
    public function numColSolicitante() {
        try {
            $stm = $this->con->query("DESCRIBE solicitante");
            $colcount = $stm->fetchAll( PDO::FETCH_ASSOC );
            echo sizeof($colcount);
            return $colcount;
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

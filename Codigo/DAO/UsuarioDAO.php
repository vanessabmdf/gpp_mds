<?php

require_once "/../lib/Conection.php";
require_once "/../model/Usuario.class.php";

class UsuarioDAO {

    private $con;

    public function UsuarioDAO() {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insereUsuario(Usuario $usuario) {
        try {
            /* Sem passagem por referência
              $nome = $usuario->getNome();
              $email = $usuario->getEmail();
              $matricula = $usuario->getMatricula();
              $data = $usuario->getData();
             */
            $query = "INSERT INTO usuario (nome, email, matricula, data_nascimento, nome_usuario, senha_usuario) 
                      VALUES (:nome, :email, :matricula, :data_nascimento, :nome_usuario, :senha_usuario)";
            $stm = $this->con->prepare($query);
            $stm->bindParam(":nome", $usuario->getNome());
            $stm->bindParam(":email", $usuario->getEmail());
            $stm->bindParam(":matricula", $usuario->getMatricula());
            $stm->bindParam(":data_nascimento", $usuario->getData());
            $stm->bindParam(":nome_usuario", $usuario->getNomeUsuario());
            $stm->bindParam(":senha_usuario", $usuario->getSenhaUsuario());
            $exec = $stm->execute();
             
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function alteraUsuario(Usuario $usuario, $codigo) {
        try {
            /* Sem passagem por referência
              $nome = $usuario->getNome();
              $email = $usuario->getEmail();
              $matricula = $usuario->getMatricula();
              $data = $usuario->getData();
             */
            $query = "UPDATE usuario SET nome=:nome, email=:email, matricula=:matricula, data_nascimento=:data_nascimento,
                      nome_usuario=:nome_usuario, senha_usuario=:senha_usuario
                      WHERE codigo = ".$codigo.""; 
                      
            $stm = $this->con->prepare($query);
            $stm->bindParam(":nome", $usuario->getNome());
            $stm->bindParam(":email", $usuario->getEmail());
            $stm->bindParam(":matricula", $usuario->getMatricula());
            $stm->bindParam(":data_nascimento", $usuario->getData());  
            $stm->bindParam(":nome_usuario", $usuario->getNomeUsuario());
            $stm->bindParam(":senha_usuario", $usuario->getSenhaUsuario());
            $stm->execute();
            $this->con->commit();
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }


    public function obterUsuario() {
        try {
            $stm = $this->con->query("SELECT * FROM usuario");
            return $stm;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deleteUsuario($codigo) {
        try {
            $stm = $this->con->query("DELETE FROM usuario WHERE codigo = ".$codigo."");
            return $stm;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    public function numColUsuario() {
        try {
            $stm = $this->con->query("DESCRIBE usuario");
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

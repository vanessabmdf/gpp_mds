<?php

require_once "/../lib/Conection.php";
require_once "/../Model/Usuario.php";

class UsuarioDAO {

    private $con;

    public function UsuarioDAO() {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserirUsuario(Usuario $usuario) {
        try {
            /* Sem passagem por referência
              $nome = $usuario->getNome();
              $email = $usuario->getEmail();
              $matricula = $usuario->getMatricula();
              $data = $usuario->getData();
             */
            $query = "INSERT INTO usuario (login, senha, email, nome, matricula, perfil_cod) 
                      VALUES (:login, :senha, :email, :nome, :matricula, :perfil_cod)";
            $stm = $this->con->prepare($query);
            $stm->bindValue(":login", $usuario->getLogin());
            $stm->bindValue(":senha", $usuario->getSenha());
            $stm->bindValue(":email", $usuario->getEmail());
            $stm->bindValue(":nome", $usuario->getNome());
            $stm->bindValue(":matricula", $usuario->getMatricula());
            $stm->bindValue(":perfil_cod", $usuario->getCodigo());
            return $stm->execute();
             
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
        public function alterarUsuario(Usuario $usuario, $login) {
        try {
            
            $query = "UPDATE usuario SET login = :login, senha = :senha, email = :email, nome = :nome, 
                      matricula = :matricula, perfil_cod = :perfil_cod WHERE login = '$login'"; 
                      
            $stm = $this->con->prepare($query);
            $stm->bindValue(":login", $usuario->getLogin());
            $stm->bindValue(":senha", $usuario->getSenha());
            $stm->bindValue(":email", $usuario->getEmail());
            $stm->bindValue(":nome", $usuario->getNome());  
            $stm->bindValue(":matricula", $usuario->getMatricula());
            $stm->bindValue(":perfil_cod", $usuario->getCodigo());
            return $stm->execute();
            //$this->con->commit();
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function obterUsuario_Especifico($login) {
        try {
                $stm = $this->con->query("SELECT * FROM usuario WHERE login = '$login'");
                
                if($stm == false)
                    return $stm;
                else{
                    //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                    foreach($stm as $row)
                    {
                        $usuario = new Usuario($row['perfil_cod'], $row['login'], $row['senha'], $row['nome'], $row['email'], $row['matricula']);               
                    }
                    return $usuario;
                }
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
    
    public function deletarUsuario($login) {
        try {
                $resultado = $this->con->query("DELETE FROM usuario WHERE login = '$login'");
                if($resultado != false)
                    return true;
                else
                    return $resultado;
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    public function numColUsuario() {
        try {
            $stm = $this->con->query("DESCRIBE usuario");
            $colcount = $stm->fetchAll( PDO::FETCH_ASSOC );
            echo sizeof($colcount);
            return sizeof($colcount);
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

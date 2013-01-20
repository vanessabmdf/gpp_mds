<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Usuario.php";

class UsuarioDAO {

    private $con;
    
    function __construct() 
    {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserirUsuario(Usuario $usuario) {
        try {
 
                $query = "INSERT INTO usuario (codigo, tipo, login, senha, nome, email, matricula, data_nascimento) 
                          VALUES (:codigo, :tipo, :login, :senha, :nome, :email, :matricula, :data_nascimento)";
            
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $usuario->getCodigo());
                $stm->bindParam(":tipo", $usuario->getTipo());
                $stm->bindParam(":login", $usuario->getLogin());
                $stm->bindParam(":senha", $usuario->getSenha());
                $stm->bindParam(":nome", $usuario->getNome());
                $stm->bindParam(":email", $usuario->getEmail());
                $stm->bindParam(":matricula", $usuario->getMatricula());
                $stm->bindParam(":data_nascimento", $usuario->getData_nascimento());
                $stm->execute();
             
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
        public function alterarUsuario(Usuario $usuario, $codigo_usuario) {
        try {
                $query = "UPDATE usuario SET codigo=:codigo, tipo=:tipo, login=:login, senha=:senha, nome=:nome, email=:email, matricula=:matricula, data_nascimento=:data_nascimento
                          WHERE codigo = ".$codigo_usuario; 
                      
                $stm = $this->con->prepare($query);
                
                $stm->bindParam(":codigo", $usuario->getCodigo());
                $stm->bindParam(":tipo", $usuario->getTipo());
                $stm->bindParam(":login", $usuario->getLogin());
                $stm->bindParam(":senha", $usuario->getSenha());
                $stm->bindParam(":nome", $usuario->getNome());
                $stm->bindParam(":email", $usuario->getEmail());
                $stm->bindParam(":matricula", $usuario->getMatricula());
                $stm->bindParam(":data_nascimento", $usuario->getData_nascimento());    
                $stm->execute();
                $this->con->commit();
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
        }


    public function obterUsuario($codigo_usuario) {
        try {
            $stm = $this->con->query("SELECT * FROM usuario WHERE codigo = ".$codigo_usuario);
            
            $usuario = new Usuario();
            //Como so 1 registro é retornado, executa o foreach 1 vez somente.
            foreach($stm as $row)
            { 
                $usuario->setCodigo($row['codigo']);
                $usuario->setTipo($row['tipo']);
                $usuario->setLogin($row['login']);
                $usuario->setSenha($row['senha']);
                $usuario->setNome($row['nome']);
                $usuario->setEmail($row['email']);
                $usuario->setMatricula($row['matricula']);
                $usuario->setData_nascimento($row['data_nascimento']);
            }
            
            return $usuario;
            
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarUsuario($codigo_usuario) {
        try {
                $this->con->query("DELETE FROM usuario WHERE codigo = ".$codigo_usuario);
            
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    /*public function numColSolicitante() {
        try {
            $stm = $this->con->query("DESCRIBE solicitante");
            $colcount = $stm->fetchAll( PDO::FETCH_ASSOC );
            echo sizeof($colcount);
            return $colcount;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }*/
    
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

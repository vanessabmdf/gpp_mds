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
 
                $query = "INSERT INTO usuario (login, cod_perfil, senha, email, nome, matricula) 
                          VALUES (:login, :cod_perfil, :senha, :email, :nome, :matricula)";
            
                $stm = $this->con->prepare($query);
                $stm->bindParam(":cod_perfil", $usuario->getCodigo());
                $stm->bindParam(":login", $usuario->getLogin());
                $stm->bindParam(":senha", $usuario->getSenha());
                $stm->bindParam(":nome", $usuario->getNome());
                $stm->bindParam(":email", $usuario->getEmail());
                $stm->bindParam(":matricula", $usuario->getMatricula());
                $stm->execute();
             
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
        public function alterarUsuario(Usuario $usuario, $login_usuario) {
        try {
                $query = "UPDATE usuario SET cod_perfil=:cod_perfil, login=:login, senha=:senha, nome=:nome, email=:email, matricula=:matricula,
                          WHERE cod_perfil = ".$login_usuario; 
                      
                $stm = $this->con->prepare($query);
                
                $stm->bindParam(":cod_perfil", $usuario->getCodigo());
                $stm->bindParam(":login", $usuario->getLogin());
                $stm->bindParam(":senha", $usuario->getSenha());
                $stm->bindParam(":nome", $usuario->getNome());
                $stm->bindParam(":email", $usuario->getEmail());
                $stm->bindParam(":matricula", $usuario->getMatricula());    
                $stm->execute();
                $this->con->commit();
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
        }


    public function obterUsuario_Especifico($login_usuario) {
        try {
            $stm = $this->con->query("SELECT * FROM usuario WHERE cod_perfil = ".$login_usuario);
            
            $usuario = new Usuario();
            //Como so 1 registro é retornado, executa o foreach 1 vez somente.
            foreach($stm as $row)
            { 
                $usuario->setCodigo($row['cod_perfil']);
                $usuario->setLogin($row['login']);
                $usuario->setSenha($row['senha']);
                $usuario->setNome($row['nome']);
                $usuario->setEmail($row['email']);
                $usuario->setMatricula($row['matricula']);
            }
            
            return $usuario;
            
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    //Obtém todos os Usuarios salvos no banco de dados.
    //O objeto retornado, precisa passar pela função foreach(), para obter cada registro.
    public function obterUsuario_Geral()
    {
        try
        {
            $stm = $this->con->query("SELECT * FROM usuario");
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarUsuario($login_usuario) {
        try {
                $this->con->query("DELETE FROM usuario WHERE codigo = ".$login_usuario);
            
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

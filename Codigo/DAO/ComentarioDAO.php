<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Comentario.php";
require_once "/../DAO/ChamadoDAO.php";
require_once "/../DAO/UsuarioDAO.php";
require_once "/../NewModel/Chamado.php";
require_once "/../NewModel/Usuario.php";

class ComentarioDAO 
{
    private $con;
    
    function __construct() 
    {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function inserirComentario(Comentario $comentario)
    {
        try {
            
                $query = "INSERT INTO comentario (codigo, descricao, chamado, usuario) 
                          VALUES (:codigo, :descricao, :chamado, :usuario)";
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $comentario->getCodigo());
                $stm->bindParam(":descricao", $comentario->getDescricao());
                $stm->bindParam(":chamado", $comentario->getChamado()->getCodigo());
                $stm->bindParam(":usuario", $comentario->getUsuario()->getCodigo());
                $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarComentario(Comentario $comentario, $codigo_comentario)
    {
        
        try {
                $query = "UPDATE comentario SET codigo=:codigo, descricao=:descricao, chamado=:chamado, usuario=:usuario
                          WHERE codigo = ".$codigo_comentario; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindParam(":codigo", $comentario->getCodigo());
                $stm->bindParam(":descricao", $comentario->getDescricao());
                $stm->bindParam(":chamado", $comentario->getChamado()->getCodigo());
                $stm->bindParam(":usuario", $comentario->getUsuario()->getCodigo());
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    
    public function obterComentario_Especifico($codigo_comentario) {
        try {
                $stm = $this->con->query("SELECT * FROM comentario WHERE codigo = ".$codigo_comentario);
                
                $comentario = new Comentario();
                //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                foreach($stm as $row)
                {
                    $comentario->setCodigo($row['codigo']);
                    $comentario->setDescricao($row['descricao']);
                
                    //Buscando chamado, para criar o objeto e atribuir a variavel $comentario.
                    $buscarChamado = new ChamadoDAO();
                
                    $chamado = $buscarChamado->obterChamado($row['chamado']);
                    $comentario->setChamado($chamado);
                
                    //Buscando usuario, para criar o objeto e atribuir a variavel $comentario.
                    $buscarUsuario = new UsuarioDAO();
                
                    $usuario = $buscarUsuario->obterUsuario($row['usuario']);
                    $comentario->setUsuario($usuario);
                }
                
                return $comentario;
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Obtém todos os Comentarios salvos no banco de dados.
    //O objeto retornado, precisa passar pela função foreach(), para obter cada registro.
    public function obterComentario_Geral()
    {
        try
        {
            $stm = $this->con->query("SELECT * FROM comentario");
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarComentario($codigo_comentario) {
        try {
                $this->con->query("DELETE FROM comentario WHERE codigo = ".$codigo_comentario);
                
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


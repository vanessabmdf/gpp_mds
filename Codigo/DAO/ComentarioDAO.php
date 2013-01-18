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
    
    
    public function obterComentario($codigo_comentario) {
        try {
                $stm = $this->con->query("SELECT * FROM comentario WHERE codigo = ".$codigo_comentario);
                
                $comentario = new Comentario();
                
                $comentario->setCodigo($stm['codigo']);
                $comentario->setDescricao($stm['descricao']);
                
                //Buscando chamado, para criar o objeto e atribuir a variavel $comentario.
                $buscarChamado = new ChamadoDAO();
                
                $chamado = $buscarChamado->obterChamado($stm['chamado']);
                $comentario->setChamado($chamado);
                
                //Buscando usuario, para criar o objeto e atribuir a variavel $comentario.
                $buscarUsuario = new UsuarioDAO();
                
                $usuario = $buscarUsuario->obterUsuario($stm['usuario']);
                $comentario->setUsuario($usuario);
                
                return $comentario;
                
            } catch (PDOException $erro) {
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

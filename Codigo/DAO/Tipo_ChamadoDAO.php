<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Tipo_Chamado.php";

class Tipo_ChamadoDAO 
{
    private $con;
    
    function __construct() 
    {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function inserirTipo_Chamado(Tipo_Chamado $tipo_chamado)
    {
        try {
            
                $query = "INSERT INTO tipo_chamado (codigo, descricao) 
                          VALUES (:codigo, :descricao)";
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $tipo_chamado->getCodigo());
                $stm->bindParam(":descricao", $tipo_chamado->getDescricao());
                $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarTipo_Chamado(Tipo_Chamado $tipo_chamado)
    {
        
        try {
                $query = "UPDATE tipo_chamado SET codigo=:codigo, descricao=:descricao
                          WHERE codigo = ".$tipo_chamado->getCodigo().""; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindParam(":codigo", $tipo_chamado->getCodigo());
                $stm->bindParam(":descricao", $tipo_chamado->getDescricao());
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    public function obterTipo_Chamado($codigo) {
        try {
                $stm = $this->con->query("SELECT * FROM tipo_chamado WHERE codigo = ".$codigo."");
                
                $tipo_chamado = new Tipo_Chamado();
                
                $tipo_chamado->setCodigo($stm['codigo']);
                $tipo_chamado->setDescricao($stm['descricao']);
                
                return $tipo_chamado;
                
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarSolucao($codigo) {
        try {
            $stm = $this->con->query("DELETE FROM tipo_chamado WHERE codigo = ".$codigo."");
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

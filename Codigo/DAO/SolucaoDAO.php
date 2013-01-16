<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Solucao.php";

class SolucaoDAO 
{
    private $con;
    
    function __construct() 
    {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function inserirSolucao(Solucao $solucao)
    {
        try {
            
                $query = "INSERT INTO solucao (codigo, descricao, data) 
                          VALUES (:codigo, :descricao, :data)";
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $solucao->getCodigo());
                $stm->bindParam(":descricao", $solucao->getDescricao());
                $stm->bindParam(":data", $solucao->getData());
                $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarSolucao(Solucao $solucao)
    {
        
        try {
                $query = "UPDATE solucao SET codigo=:codigo, descricao=:descricao, data=:data
                          WHERE codigo = ".$solucao->getCodigo().""; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindParam(":codigo", $solucao->getCodigo());
                $stm->bindParam(":descricao", $solucao->getDescricao());
                $stm->bindParam(":data", $solucao->getData());
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    
    public function obterSolucao($codigo) {
        try {
                $stm = $this->con->query("SELECT * FROM solucao WHERE codigo = ".$codigo."");
                
                $solucao = new Solucao();
                
                $solucao->setCodigo($stm['codigo']);
                $solucao->setDescricao($stm['descricao']);
                $solucao->setData($stm['data']);
                
                return $solucao;
                
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarSolucao($codigo) {
        try {
            $stm = $this->con->query("DELETE FROM solucao WHERE codigo = ".$codigo."");
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

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
            
                $query = "INSERT INTO solucao (cod, descricao, dt_solucao) 
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
    
    public function alterarSolucao(Solucao $solucao, $codigo_solucao)
    {
        
        try {
                $query = "UPDATE solucao SET cod=:codigo, descricao=:descricao, dt_solucao=:data
                          WHERE cod = ".$codigo_solucao; 
                      
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
    
    
    public function obterSolucao_Especifico($codigo_solucao) {
        try {
                $stm = $this->con->query("SELECT * FROM solucao WHERE cod = ".$codigo_solucao);
                
                $solucao = new Solucao();
                //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                foreach($stm as $row)
                {
                    $solucao->setCodigo($row['cod']);
                    $solucao->setDescricao($row['descricao']);
                    $solucao->setData($row['dt_solucao']);
                }
                
                return $solucao;
                
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    //Obtém todos as Solucoes salvas no banco de dados.
    //O objeto retornado, precisa passar pela função foreach(), para obter cada registro.
    public function obterSolucao_Geral()
    {
        try
        {
            $stm = $this->con->query("SELECT * FROM solucao");
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarSolucao($codigo_solucao) {
        try {
                $this->con->query("DELETE FROM solucao WHERE cod = ".$codigo_solucao);
                
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    //Função de fechar a conexão aberta no DAO
    public function fechaConexão() {
        try {
            $this->con = null;
            return $this->con;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
}

?>

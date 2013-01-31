<?php

require_once "/../lib/Conection.php";
require_once "/../Model/Solucao.php";

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
            
                $query = "INSERT INTO solucao (descricao) 
                          VALUES (:descricao)";
                $stm = $this->con->prepare($query);
                $stm->bindValue(":descricao", $solucao->getDescricao());
                return $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarSolucao(Solucao $solucao, $codigo_solucao)
    {
        
        try {
                $query = "UPDATE solucao SET descricao=:descricao
                          WHERE cod = '$codigo_solucao'"; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindValue(":descricao", $solucao->getDescricao());
                return $stm->execute();
                //$this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    
    public function obterSolucao_Especifico($codigo_solucao) {
        try {
            
                
                $stm = $this->con->query("SELECT * FROM solucao WHERE cod = '$codigo_solucao'");
                
                if($stm == false)
                    return $stm;
                else{
                    //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                    foreach($stm as $row)
                    {
                        $solucao = new Solucao($row['cod'], $row['descricao'], $row['data_solucao']);
                    }
                    return $solucao;
                }
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
                $resultado = $this->con->query("DELETE FROM solucao WHERE cod = '$codigo_solucao'");
                if($resultado != false)
                    return true;
                else
                    return $resultado;
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

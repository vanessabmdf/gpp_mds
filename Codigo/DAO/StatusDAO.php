<?php

require_once "/../lib/Conection.php";
require_once "/../Model/Status.php";

class StatusDAO 
{
    private $con;
    
    function __construct() 
    {
            $this->con = new Conection();
            //Função para aparecer os erros e warnings
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function inserirStatus(Status $status)
    {
        try {
            
                $query = "INSERT INTO status (cod, descricao) 
                          VALUES (:codigo, :nome)";
                $stm = $this->con->prepare($query);
                $stm->bindValue(":codigo", $status->getCodigo());
                $stm->bindValue(":nome", $status->getNome());
                
                return $stm->execute();
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }   
    }
    
    public function alterarStatus(Status $status, $codigo_status)
    {
        
       try {
                $query = "UPDATE status SET cod=:codigo, descricao=:nome WHERE cod = '$codigo_status' "; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindValue(":codigo", $status->getCodigo());
                $stm->bindValue(":nome", $status->getNome());
                
                return $stm->execute();    
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    
    public function obterStatus_Especifico($codigo_status) 
    {
        try {
                $stm = $this->con->query("SELECT * FROM status WHERE cod = '$codigo_status'");
              
                //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                foreach($stm as $row)
                {
                    $status = new Status($row['cod'], $row['descricao']);
                    return $status;
                }
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Obtém todos os Status salvos no banco de dados.
    //O objeto retornado, precisa passar pela função foreach(), para obter cada registro.
    public function obterStatus_Geral()
    {
        try
        {
            $stm = $this->con->query("SELECT * FROM status");
            
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarStatus($codigo_status) {
       try {
                $resultado = $this->con->query("DELETE FROM status WHERE cod = '$codigo_status'");
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
            return $this->con = null;
    }
}

?>

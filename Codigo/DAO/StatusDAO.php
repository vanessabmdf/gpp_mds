<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Status.php";

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
            
                $query = "INSERT INTO status (codigo, nome) 
                          VALUES (:codigo, :nome)";
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $status->getCodigo());;
                $stm->bindParam(":nome", $status->getNome());
                $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarStatus(Status $status, $codigo_status)
    {
        
        try {
                $query = "UPDATE status SET codigo=:codigo, nome=:nome WHERE codigo = ".$codigo_status; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindParam(":codigo", $status->getCodigo());
                $stm->bindParam(":nome", $status->getNome());
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    
    public function obterStatus($codigo_status) {
        try {
                $stm = $this->con->query("SELECT * FROM status WHERE codigo = ".$codigo_status);
                
                $status = new Status();
                
                $status->setCodigo($stm['codigo']);
                $status->setNome($stm['nome']);
                
                return $status;
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    public function deletarStatus($codigo_status) {
        try {
                $this->con->query("DELETE FROM status WHERE codigo = ".$codigo_status);
                
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

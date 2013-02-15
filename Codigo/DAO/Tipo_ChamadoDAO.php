<?php

require_once "/../lib/Conection.php";
require_once "/../Model/Tipo_Chamado.php";

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
            
                $query = "INSERT INTO tipo_chamado (cod, descricao) 
                          VALUES (:codigo, :descricao)";
                $stm = $this->con->prepare($query);
                $stm->bindValue(":codigo", $tipo_chamado->getCodigo());
                $stm->bindValue(":descricao", $tipo_chamado->getDescricao());
                return $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarTipo_Chamado(Tipo_Chamado $tipo_chamado, $codigo_tipo_chamado)
    {
        
       try {
                $query = "UPDATE $tipo_chamado SET cod=:codigo, descricao=:descricao WHERE cod = '$codigo_tipo_chamado' "; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindValue(":codigo", $tipo_chamado->getCodigo());
                $stm->bindValue(":nome", $tipo_chamado->getDescricao());
                return $stm->execute();
         
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    
    }
    
    
    public function obterTipo_Chamado_Especifico($codigo_tipo_chamado) {
        try {
                $stm = $this->con->query("SELECT * FROM tipo_chamado WHERE cod = '$codigo_tipo_chamado'");
                
                
                //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                foreach($stm as $row)
                {
                    $tipo_chamado = new Tipo_Chamado($row['cod'], $row['descricao']);
                }
                
                return $tipo_chamado;
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Obtém todos os Tipo_Chamado salvos no banco de dados.
    //O objeto retornado, precisa passar pela função foreach(), para obter cada registro.
    public function obterTipo_Chamado_Geral()
    {
        try
        {
            $stm = $this->con->query("SELECT * FROM tipo_chamado");
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarTipo_Chamado($codigo_tipo_chamado) {
       try {
                $resultado = $this->con->query("DELETE FROM tipo_chamado WHERE cod = '$codigo_tipo_chamado'");
                if($resultado != false)
                    return true;
                else
                    return $resultado;
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Função de fechar a conexão aberta no DAO
    public function fechaConexao() {
        try {
            return $this->con = null;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

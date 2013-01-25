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
            
                $query = "INSERT INTO tipo_servico (cod, descricao) 
                          VALUES (:codigo, :descricao)";
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $tipo_chamado->getCodigo());
                $stm->bindParam(":descricao", $tipo_chamado->getDescricao());
                $stm->execute();
             
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }   
    }
    
    public function alterarTipo_Chamado(Tipo_Chamado $tipo_chamado, $codigoTipo_Chamado)
    {
        
        try {
                $query = "UPDATE tipo_servico SET cod=:codigo, descricao=:descricao
                          WHERE cod = ".$codigoTipo_Chamado; 
                      
                $stm = $this->con->prepare($query);            
                $stm->bindParam(":codigo", $tipo_chamado->getCodigo());
                $stm->bindParam(":descricao", $tipo_chamado->getDescricao());
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    //Obtém um Tipo_Chamado especifico, de acordo com o codigo passado como parametro.
    public function obterTipo_Chamado_Especifico($codigoTipo_Chamado) {
        try {
                $stm = $this->con->query("SELECT * FROM tipo_servico WHERE cod = ".$codigoTipo_Chamado);
                
                $tipo_chamado = new Tipo_Chamado();
                //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                foreach($stm as $row)
                {
                    $tipo_chamado->setCodigo($row['cod']);
                    $tipo_chamado->setDescricao($row['descricao']);
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
            $stm = $this->con->query("SELECT * FROM tipo_servico");
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function deletarTipo_Chamado($codigoTipo_Chamado) {
        try {
                $this->con->query("DELETE FROM tipo_servico WHERE cod = ".$codigoTipo_Chamado);
            
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Função de fechar a conexão aberta no Banco de Dados.
    public function fechaConexão() {
        try {
                $this->con = null;
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
}

?>

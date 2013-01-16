<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Chamado.php";

class ChamadoDAO
{
    private $con;

    function __construct() 
    {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserirChamado(Chamado $chamado) {
        try {
                //Serializa os objetos atributos da classe CHAMADO, para inserir no banco de dados.
                //Tem que ser armazenado em um tipo de dados BLOB.
                //Os dados sao convertidos pra forma de string binaria.
                $solicitante_serial = serialize($chamado->getSolicitante());
                $tecnico_serial = serialize($chamado->getTecnico());
                $status_serial = serialize($chamado->getStatus());
                $solucao_serial = serialize($chamado->getSolucao());
                $tipo_chamado_serial = serialize($chamado->getTipoChamado());
            
                $query = "INSERT INTO chamado (codigo, data_inicial, data_final, descricao, comentarioChamado, solicitante, tecnico, status, solucao, tipoChamado) 
                          VALUES (:codigo, :data_inicial, :data_final, :descricao, :comentarioChamado, :solicitante, :tecnico, :status, :solucao, :tipoChamado)";
            
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $chamado->getCodigo());
                $stm->bindParam(":data_inicial", $chamado->getData_inicial());
                $stm->bindParam(":data_final", $chamado->getData_final());
                $stm->bindParam(":descricao", $chamado->getDescricao());
                $stm->bindParam(":comentarioChamado", $chamado->getComentarioChamado());
                $stm->bindParam(":solicitante", $solicitante_serial);
                $stm->bindParam(":tecnico", $tecnico_serial);
                $stm->bindParam(":status", $status_serial);
                $stm->bindParam(":solucao", $solucao_serial);
                $stm->bindParam(":tipo_chamado", $tipo_chamado_serial);
            
                $stm->execute();
             
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function alterarChamado(Chamado $chamado, $codigo_chamado)
    {
        try {
            
                //Serializa os objetos atributos da classe CHAMADO, para inserir no banco de dados.
                //Tem que ser armazenado em um tipo de dados BLOB.
                //Os dados sao convertidos pra forma de string binaria.
                $solicitante_serial = serialize($chamado->getSolicitante());
                $tecnico_serial = serialize($chamado->getTecnico());
                $status_serial = serialize($chamado->getStatus());
                $solucao_serial = serialize($chamado->getSolucao());
                $tipo_chamado_serial = serialize($chamado->getTipoChamado());
            
                $query = "UPDATE chamado SET codigo=:codigo, data_inicial=:data_inicial, data_final=:data_final, descricao=:descricao, comentarioChamado=:comentarioChamado, 
                          solicitante=:solicitante, tecnico=:tecnico, status=:status, solucao=:solucao, tipoChamado=:tipo_chamado
                          WHERE codigo = ".$codigo_chamado; 
                      
                $stm = $this->con->prepare($query);
                
                $stm->bindParam(":codigo", $chamado->getCodigo());
                $stm->bindParam(":data_inicial", $chamado->getData_inicial());
                $stm->bindParam(":data_final", $chamado->getData_final());
                $stm->bindParam(":descricao", $chamado->getDescricao());
                $stm->bindParam(":comentarioChamado", $chamado->getComentarioChamado());
                $stm->bindParam(":solicitante", $solicitante_serial);
                $stm->bindParam(":tecnico", $tecnico_serial);
                $stm->bindParam(":status", $status_serial);
                $stm->bindParam(":solucao", $solucao_serial);
                $stm->bindParam(":tipo_chamado", $tipo_chamado_serial);
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    public function obterChamado($codigo_chamado) {
        try {
            
                $stm = $this->con->query("SELECT * FROM chamado WHERE codigo = ".$codigo_chamado."");
                //Criando um objeto chamado e armazenando as informações nele.
                $chamado = new Chamado();
                
                $chamado->setCodigo($stm['codigo']);
                $chamado->setData_inicial($stm['data_inicial']);
                $chamado->setData_final($stm['data_final']);
                $chamado->setDescricao($stm['descricao']);
                $chamado->setComentarioChamado($stm['comentarioChamado']);
                
                //Deserializando os objetos serializados no banco de dados, e armazenando no objeto chamado.
                $solicitante_obj = unserialize($stm['solicitante']);
                $tecnico_obj = unserialize($stm['tecnico']);
                $status_obj = unserialize($stm['status']);
                $solucao_obj = unserialize($stm['solucao']);
                $tipo_chamado_obj = unserialize($stm['tipoChamado']);
                
                $chamado->setSolicitante($solicitante_obj);
                $chamado->setTecnico($tecnico_obj);
                $chamado->setStatus($status_obj);
                $chamado->setSolucao($solucao_obj);
                $chamado->setTipoChamado($tipo_chamado_obj);
              
                return $chamado;
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
     public function deletarChamado($codigo_chamado) {
        try {
                //Deleta um registro. Retorna um booleano que ainda não é usado.
                $this->con->query("DELETE FROM chamado WHERE codigo = ".$codigo_chamado."");
                 
            }catch (PDOException $erro) {
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

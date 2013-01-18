<?php

require_once "/../lib/Conection.php";
require_once "/../NewModel/Chamado.php";
require_once "/../DAO/UsuarioDAO.php";
require_once "/../DAO/SolucaoDAO.php";
require_once "/../DAO/Tipo_ChamadoDAO.php";
require_once "/../NewModel/Usuario.php";
require_once "/../NewModel/Tipo_Chamado.php";


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
            
                $query = "INSERT INTO chamado (codigo, data_inicial, data_final, descricao, comentarioChamado, solicitante, tecnico, status, solucao, tipoChamado) 
                          VALUES (:codigo, :data_inicial, :data_final, :descricao, :comentarioChamado, :solicitante, :tecnico, :status, :solucao, :tipoChamado)";
            
                $stm = $this->con->prepare($query);
                $stm->bindParam(":codigo", $chamado->getCodigo());
                $stm->bindParam(":data_inicial", $chamado->getData_inicial());
                $stm->bindParam(":data_final", $chamado->getData_final());
                $stm->bindParam(":descricao", $chamado->getDescricao());
                $stm->bindParam(":comentarioChamado", $chamado->getComentarioChamado());
                $stm->bindParam(":solicitante",$chamado->getSolicitante()->getCodigo());
                $stm->bindParam(":tecnico", $chamado->getTecnico()->getCodigo());
                $stm->bindParam(":status", $chamado->getStatus()->getCodigo());
                $stm->bindParam(":solucao", $chamado->getSolucao()->getCodigo());
                $stm->bindParam(":tipo_chamado", $chamado->getTipoChamado()->getCodigo());
            
                $stm->execute();
             
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function alterarChamado(Chamado $chamado, $codigo_chamado)
    {
        try {
            
                $query = "UPDATE chamado SET codigo=:codigo, data_inicial=:data_inicial, data_final=:data_final, descricao=:descricao, comentarioChamado=:comentarioChamado, 
                          solicitante=:solicitante, tecnico=:tecnico, status=:status, solucao=:solucao, tipoChamado=:tipo_chamado
                          WHERE codigo = ".$codigo_chamado; 
                      
                $stm = $this->con->prepare($query);
                
                $stm->bindParam(":codigo", $chamado->getCodigo());
                $stm->bindParam(":data_inicial", $chamado->getData_inicial());
                $stm->bindParam(":data_final", $chamado->getData_final());
                $stm->bindParam(":descricao", $chamado->getDescricao());
                $stm->bindParam(":comentarioChamado", $chamado->getComentarioChamado());
                $stm->bindParam(":solicitante",$chamado->getSolicitante()->getCodigo());
                $stm->bindParam(":tecnico", $chamado->getTecnico()->getCodigo());
                $stm->bindParam(":status", $chamado->getStatus()->getCodigo());
                $stm->bindParam(":solucao", $chamado->getSolucao()->getCodigo());
                $stm->bindParam(":tipo_chamado", $chamado->getTipoChamado()->getCodigo());
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    public function obterChamado($codigo_chamado) {
        try {
            
                $stm = $this->con->query("SELECT * FROM chamado WHERE codigo = ".$codigo_chamado);
                //Criando um objeto chamado e armazenando as informações nele.
                $chamado = new Chamado();
                
                $chamado->setCodigo($stm['codigo']);
                $chamado->setData_inicial($stm['data_inicial']);
                $chamado->setData_final($stm['data_final']);
                $chamado->setDescricao($stm['descricao']);
                
                //Falta criar o objeto do comentario do chamado.
                
                //Buscando solicitante, para criar o objeto e atribuir a variavel $chamado.
                $buscarUsuario = new UsuarioDAO();
                $solicitante = $buscarUsuario->obterUsuario($stm['solicitante']);
                $chamado->setSolicitante($solicitante);
             
                //Buscando tecnico, para criar o objeto e atribuir a variavel $chamado.
                $tecnico = $buscarUsuario->obterUsuario($stm['tecnico']);
                $chamado->setTecnico($tecnico);
                
                /*Bucando status, para criar o objeto e atribuir a variaval $chamado.
                $dadosStatus = $this->con->query("SELECT * FROM status WHERE codigo = ".$stm['status']);
                
                $status = new Status();
                
                $status->setCodigo($dadosStatus['codigo']);
                $status->setNome($dadosStatus['nome']);
                $chamado->setStatus($status);*/
                
                //Bucando solucao, para criar o objeto e atribuir a variavel $chamado.
                $buscarSolucao = new SolucaoDAO();
                
                $solucao = $buscarSolucao->obterSolucao($stm['solucao']);
                $chamado->setSolucao($solucao);
             
                
                //Buscando tipo_chamado, para criar o objeto e atribuir a variavel $chamado.
                $buscarTipo_Chamado = new Tipo_ChamadoDAO();
                $tipoChamado = $buscarTipo_Chamado->obterTipo_Chamado($stm['tipoChamado']);
                $chamado->setTipoChamado($tipoChamado);
                
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

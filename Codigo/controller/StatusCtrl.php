<?php

require_once "/../DAO/SolucaoDAO.php";
require_once "/../NewModel/Solucao.php";


class StatusCtrl {

    private $DAO;
    /*
    public function SolicitanteDAO() {
        $this->DAO = new SolicitanteDAO();
    }
    */
   
    public function insStatus($codigo, $nome) {
        try {
                $status = new Status();

                $status->setCodigo($codigo);
                $status->setNome($nome);
         
                $DAO = new StatusDAO();
                $DAO->inserirStatus($status);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function delStatus($codigo_status) {
        try {
                $DAO = new StatusDAO();
                $DAO->deletarStatus($codigo_status);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
   public function listaStatus() {
        try {
                $DAO = new StatusDAO();
                $lista = $DAO->obterStatus_Geral();
                $DAO->fechaConexão();
            return $lista;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
   public function obterStatus_Especifico($codigo_status)
   {
       $DAO = new StatusDAO();
       $status = $DAO->obterStatus_Especifico($codigo_status);
       return $status;
   }
   
   public function alteraStatus($codigo, $nome) {
        try {     
                $status = new Status();
            
                $status->setCodigo($codigo);
                $status->setNome($nome);
            
                $DAO = new StatusDAO();
                $DAO->alterarStatus($status, $codigo);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

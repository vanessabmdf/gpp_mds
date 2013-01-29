<?php

require_once "/../DAO/StatusDAO.php";
require_once "/../Model/Status.php";


class StatusCtrl {

    private $DAO;
    /*
    public function SolicitanteDAO() {
        $this->DAO = new SolicitanteDAO();
    }
    */
   
    public function insStatus($codigo, $nome) {
        try {
                $status = new Status($codigo, $nome);
                
                $DAO = new StatusDAO();
                $resultado = $DAO->inserirStatus($status);
                $DAO->fechaConexão();
                return $resultado;
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
   
   public function alteraStatus($codigo, $nome, $codigo_busca) {
        try {     
                $status = new Status($codigo, $nome);
           
                $DAO = new StatusDAO();
                $DAO->alterarStatus($status, $codigo_busca);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

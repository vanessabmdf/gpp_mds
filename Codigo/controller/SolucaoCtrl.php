<?php

require_once "/../DAO/SolucaoDAO.php";
require_once "/../NewModel/Solucao.php";


class SolucaoCtrl {

    private $DAO;
    /*
    public function SolicitanteDAO() {
        $this->DAO = new SolicitanteDAO();
    }
    */
   
    public function insSolucao($codigo, $descricao, $data) {
        try {
                $solucao = new Solucao();

                $solucao->setCodigo($codigo);
                $solucao->setDescricao($descricao);
                $solucao->setData($data);
         
                $DAO = new SolucaoDAO();
                $DAO->inserirSolucao($solucao);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function delSolucao($codigo_solucao) {
        try {
                $DAO = new SolucaoDAO();
                $DAO->deletarSolucao($codigo_solucao);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
   public function listaSolucao() {
        try {
                $DAO = new SolucaoDAO();
                $lista = $DAO->obterSolucao_Geral();
                $DAO->fechaConexão();
            return $lista;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
   }
   
   public function obterSolucao_Especifico($codigo_solucao)
   {
       $DAO = new SolucaoDAO();
       $solucao = $DAO->obterSolucao_Especifico($codigo_solucao);
       return $solucao;
   }
    
   public function alteraSolucao($codigo, $descricao, $data) {
        try {     
                $solucao = new Solucao();
            
                $solucao->setCodigo($codigo);
                $solucao->setDescricao($descricao);
                $solucao->setData($data);
            
                $DAO = new SolucaoDAO();
                $DAO->alterarSolucao($solucao, $codigo);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

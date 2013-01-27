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
    function __construct() {
        $this->DAO = new SolucaoDAO();
    }
   
    public function insSolucao($codigo, $descricao, $data) {
        //try {
                $solucao = new Solucao($codigo, $descricao, $data);

                $resultado = $this->DAO->inserirSolucao($solucao);
                $this->DAO->fechaConexão();
                return $resultado;
        //} catch (Exception $erro) {
          //  echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        //}
    }

    public function delSolucao($codigo_solucao) {
        try {
                $resultado = $this->DAO->deletarSolucao($codigo_solucao);
                $this->DAO->fechaConexão();
                return $resultado;
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
       $solucao = $this->DAO->obterSolucao_Especifico($codigo_solucao);
       return $solucao;
   }
    
   public function alteraSolucao($codigo, $descricao, $data, $cod_busca_solucao) {
        try {     
                $solucao = new Solucao($codigo, $descricao, $data);
            
                $resultado = $this->DAO->alterarSolucao($solucao, $cod_busca_solucao);
                $this->DAO->fechaConexão();
                return $resultado;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

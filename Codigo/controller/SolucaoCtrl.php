<?php

require_once "/../DAO/SolucaoDAO.php";
require_once "/../Model/Solucao.php";


class SolucaoCtrl {
   
    public function insSolucao($codigo, $descricao, $data) {
        try {
                $solucao = new Solucao($codigo, $descricao, $data);

                $DAO = new SolucaoDAO();
                $resultado = $DAO->inserirSolucao($solucao);
                $DAO->fechaConexão();
                return $resultado;
            } catch (Exception $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }

    public function delSolucao($codigo_solucao) {
        try {
                $DAO = new SolucaoDAO();
                $resultado = $DAO->deletarSolucao($codigo_solucao);
                $DAO->fechaConexão();
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
       $DAO = new SolucaoDAO();
       $solucao = $DAO->obterSolucao_Especifico($codigo_solucao);
       $DAO->fechaConexão();
       return $solucao;
   }
    
   public function alteraSolucao($codigo, $descricao, $data, $cod_busca_solucao) {
        try {     
                $solucao = new Solucao($codigo, $descricao, $data);
            
                $DAO = new SolucaoDAO();
                $resultado = $DAO->alterarSolucao($solucao, $cod_busca_solucao);
                $DAO->fechaConexão();
                return $resultado;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}

?>

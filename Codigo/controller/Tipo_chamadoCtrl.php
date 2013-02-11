<?php

require_once "/../DAO/Tipo_ChamadoDAO.php";
require_once "/../Model/Tipo_Chamado.php";


class Tipo_ChamadoCtrl {

    private $DAO;
    /*
    public function SolicitanteDAO() {
        $this->DAO = new SolicitanteDAO();
    }
    */
   
    public function insTipo_Chamado($codigo, $descricao) {
        try {
                $tipo_chamado = new Tipo_Chamado($codigo, $descricao);
                
                $DAO = new Tipo_ChamadoDAO();
                $resultado = $DAO->inserirTipo_Chamado($tipo_chamado);
                $DAO->fechaConexão();
                return $resultado;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }

    public function delTipo_Chamado($codigo_tipo_chamado) {
        try {
                $DAO = new Tipo_ChamadoDAO();
                $DAO->deletarTipo_Chamado($codigo_tipo_chamado);
                $DAO->fechaConexão();
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
   public function listaTipo_Chamado() {
        try {
                $DAO = new Tipo_ChamadoDAO();
                $lista = $DAO->obterTipo_Chamado_Geral();
                $DAO->fechaConexão();
            return $lista;
        } catch (Exception $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
   public function obterTipo_Chamado_Especifico($codigo_tipo_chamado)
   {
       $DAO = new Tipo_ChamadoDAO();
       $tipo_chamado = $DAO->obterTipo_Chamado_Especifico($codigo_tipo_chamado);
       return $tipo_chamado;
   }
   
   public function alteratipo_chamado($codigo, $descricao, $codigo_busca) {
        try {     
                $tipo_chamado = new Tipo_Chamado($codigo, $descricao);
           
                $DAO = new Tipo_ChamadoDAO();
                    $DAO->alterarTipo_Chamado($tipo_chamado, $codigo_busca);
                    $DAO->fechaConexão();
            } catch (Exception $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
        }
    }

    ?>

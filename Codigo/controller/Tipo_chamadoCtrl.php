<?php

require_once "/../DAO/Tipo_ChamadoDAO.php";
require_once "/../Model/Tipo_Chamado.php";


class Tipo_ChamadoCtrl {
   
    public function insTipo_Chamado($codigo, $descricao) 
    {
                $tipo_chamado = new Tipo_Chamado($codigo, $descricao);
                
                $DAO = new Tipo_ChamadoDAO();
                $resultado = $DAO->inserirTipo_Chamado($tipo_chamado);
                $DAO->fechaConexao();
                return $resultado;
    }

    public function delTipo_Chamado($codigo_tipo_chamado) 
    {
        
                $DAO = new Tipo_ChamadoDAO();
                $DAO->deletarTipo_Chamado($codigo_tipo_chamado);
                $DAO->fechaConexao();
    }
    
   public function listaTipo_Chamado() 
   {
                $DAO = new Tipo_ChamadoDAO();
                $lista = $DAO->obterTipo_Chamado_Geral();
                $DAO->fechaConexao();
                return $lista;
    }
    
   public function obterTipo_Chamado_Especifico($codigo_tipo_chamado)
   {
                $DAO = new Tipo_ChamadoDAO();
                $tipo_chamado = $DAO->obterTipo_Chamado_Especifico($codigo_tipo_chamado);
                return $tipo_chamado;
   }
   
   public function alteratipo_chamado($codigo, $descricao, $codigo_busca) 
   {  
                $tipo_chamado = new Tipo_Chamado($codigo, $descricao);
           
                $DAO = new Tipo_ChamadoDAO();
                $DAO->alterarTipo_Chamado($tipo_chamado, $codigo_busca);
                $DAO->fechaConexao();
   }
   
 }

    ?>

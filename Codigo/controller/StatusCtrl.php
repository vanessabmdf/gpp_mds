<?php

require_once "/../DAO/StatusDAO.php";
require_once "/../Model/Status.php";


class StatusCtrl {
   
    public function insStatus($codigo, $nome) 
    {
                $status = new Status($codigo, $nome);
                
                $DAO = new StatusDAO();
                $resultado = $DAO->inserirStatus($status);
                $DAO->fechaConexão();
                return $resultado;
    }

    public function delStatus($codigo_status) 
    {
        
                $DAO = new StatusDAO();
                $DAO->deletarStatus($codigo_status);
                $DAO->fechaConexão();
    }
    
   public function listaStatus() 
   {
   
                $DAO = new StatusDAO();
                $lista = $DAO->obterStatus_Geral();
                $DAO->fechaConexão();
                return $lista;
    }
    
   public function obterStatus_Especifico($codigo_status)
   {
                $DAO = new StatusDAO();
                $status = $DAO->obterStatus_Especifico($codigo_status);
                return $status;
   }
   
   public function alteraStatus($codigo, $nome, $codigo_busca) 
   {  
                $status = new Status($codigo, $nome);
           
                $DAO = new StatusDAO();
                $DAO->alterarStatus($status, $codigo_busca);
                $DAO->fechaConexão();
   }
   
  }

    ?>

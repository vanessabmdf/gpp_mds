<?php

require_once "/../DAO/ChamadoDAO.php";
require_once "/../Model/Chamado.php";

class ChamadoCtrl{
        
    public function insChamado($descricao, $solicitante_login, $status_cod, $tipoChamado, $local_equipamento, $equip_patrimonio)
    {
          $chamado = new Chamado($descricao, $solicitante_login, $status_cod, $tipoChamado, $local_equipamento, $equip_patrimonio);

          $DAO = new ChamadoDAO();
          $resultado = $DAO->inserirChamado($chamado);
          $DAO->fechaConexão();
          return $resultado;
     } 
     public function alteraChamado($codigo_chamado, $login_tecnico, $status_cod)
     {
          $DAO = new ChamadoDAO();
          $resultado = $DAO->alterarChamado($codigo_chamado, $login_tecnico, $status_cod);
          $DAO->fechaConexão();
          return $resultado; 
     }
        
      public function obterChamado_Especifico($codigo_chamado)
      {
          $DAO = new ChamadoDAO();
          $resultado = $DAO->obterChamado_Especifico($codigo_chamado);
          $DAO->fechaConexão();
          return $resultado;
      }
      
       public function listaChamado() 
      {
          $DAO = new ChamadoDAO();
          $lista = $DAO->obterChamado_Geral();
          $DAO->fechaConexão();
          return $lista;
      }
      
      public function obterChamadoPorStatus($cod_status)
      {
          $DAO = new ChamadoDAO();
          $resultado = $DAO->obterChamadoPorStatus($cod_status);
          $DAO->fechaConexão();
          return $resultado;
      }
      
      public function obterChamadoPorSolicitante($login_usuario)
      {
          $DAO = new ChamadoDAO();
          $resultado = $DAO->obterChamadoPorSolicitante($login_usuario);
          $DAO->fechaConexão();
          return $resultado;
      }
      
      public function obterChamadoPorTecnico($login_tecnico)
      {
          $DAO = new ChamadoDAO();
          $resultado = $DAO->obterChamadoPorTecnico($login_tecnico);
          $DAO->fechaConexão();
          return $resultado;
      }
      
      public function deletarChamado($codigo_chamado)
      {          
          $DAO = new ChamadoDAO();
          $resultado = $DAO->deletarChamado($codigo_chamado);
          $DAO->fechaConexão();
          return $resultado;
      }
}
?>

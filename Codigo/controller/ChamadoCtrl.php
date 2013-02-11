<?php

require_once "/../DAO/ChamadoDAO.php";
require_once "/../Model/Chamado.php";

    class ChamadoCtrl{
        
            public function inserirChamado($descricao, $equip_patrimonio, $equip_localixaçao, $tecnico){
                try {
                    $chamado = new Chamado($descricao, $equip_patrimonio, $equip_localixaçao, $tecnico);

                    $DAO = new ChamadoDAO();
                    $resultado = $DAO->inserirChamado($chamado);
                    $DAO->fechaConexão();
                    return $resultado;
            }catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
     }
        public function alterarChamado($codigo, $data_inicial, $data_final, $descricao, $comentarioChamado, $solicitante, $tecnico, $status, $solucao, $tipo_chamado, $codigo_chamado){
            try{
                    $chamado = new Chamado($codigo, $data_inicial, $data_final, $descricao, $comentarioChamado, $solicitante, $tecnico, $status, $solucao, $tipo_chamado);
                    
                    $DAO = new ChamadoDAO();
                    $resultado = $DAO->alterarChamado($chamado, $codigo_chamado);
                    $DAO->fechaConexão();
                    return $resultado; 
                } catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
     }
        
      public function obterChamado_Especifico($codigo_chamado){
          
          $chamado = new Chamado($codigo_chamado);
          $DAO = new ChamadoDAO();
          $DAO->fechaConexão();
          return $chamado;
      }
      
      public function deletarChamado($codigo_chamado){
          try{
              
              $chamado = new Chamado($codigo_chamado);
              $DAO = new Chamado($chamado);
              $DAO->fechaConexão();
              return $chamado;
      }catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
      }
          
   }


    }
?>

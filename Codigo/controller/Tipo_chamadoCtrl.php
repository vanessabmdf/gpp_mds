<?php

    require_once "/../DAO/Tipo_ChamadoDAO.php";
    require_once "/../Model/Tipo_Chamado.php";
    
    class Tipo_chamadoCtrl{
        
        public function insTipo_Chamado($codigo,$descricao){
            try {
                $tipo_chamado = new Tipo_Chamado($codigo, $descricao);
                
                $DAO = new Tipo_ChamadoDAO();
                $resultado = $DAO->inserirTipo_Chamado($tipo_chamado);
                $DAO->fechaConexão();
                return $resultado;                 
        } catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
            
    }
    
        Public function alterarTipo_Chamado($codigo, $descricao, $cod_busca_chamado){
            try{
                    $tipo_chamado = new Tipo_Chamado($codigo, $descricao);
                    
                    $DAO = new Tipo_ChamadoDAO();
                    $resultado = $DAO->alterarTipo_Chamado($tipo_chamado, $cod_busca_chamado);
                    $DAO->fechaConexão();
                    return $resultado; 
                } catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
        }
        
        Public function obterTipo_Chamado_Especifico($codigoTipo_Chamado){
            
                    $tipo_chamado = new Tipo_chamado($codigoTipo_Chamado);
                    $DAO = new Tipo_ChamadoDAO();
                    $DAO->fechaConexão();
                    return $tipo_chamado;
        }
        
        Public function deletarTipo_Chamado($codigoTipo_Chamado){
            try{
                
                    $tipo_chamado = new Tipo_Chamado($codigoTipo_Chamado);
                    $DAO = new Tipo_Chamado($tipo_chamado);
                    $DAO->fechaConexão();
                    return tipo_chamado;
        }catch (Exception $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
        }
        
}
       
?>

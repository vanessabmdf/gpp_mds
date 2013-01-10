<?php

require_once "/../lib/Conection.php";
require_once "/../model/Chamado.class.php";
require_once "/../model/Status.class.php";
require_once "/../model/Comentario.class.php";
require_once "/../model/Subtipo_Servico.class.php";

class ChamadoDAO
{
    private $con;

    public function ChamadoDAO() {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /*Nao insere os atributos:
     * cod_solicitante
     * cod_tecnico
     * E o atributo referente a classe solução, que esta faltando no diagrama de classes e na classe Chamado.
     */
    public function insereChamado(Chamado $chamado, Status $status, Comentario $comentario, Subtipo_servico $sub_servico) {
        try {
            $query = "INSERT INTO chamado (descricao, data_inicial, data_final, codigo_status, codigo_servico) 
                      VALUES (:descricao, :dt_ini, :dt_final, :cod_status, :cod_servico)";
            $stm = $this->con->prepare($query);
            $stm->bindParam(":descricao", $chamado->getdescricao());
            $stm->bindParam(":dt_ini", $chamado->getdata_inicial());
            $stm->bindParam(":dt_final", $chamado->getdata_final());
            $stm->bindParam(":cod_status", $status->getcodigo());
            //Pega o codigo da classe Subtipo_Serviço ou da classe Tipo_Serviço?
            $stm->bindParam(":cod_servico", $sub_servico->getcodigo());
            $exec = $stm->execute();
             
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
}



?>

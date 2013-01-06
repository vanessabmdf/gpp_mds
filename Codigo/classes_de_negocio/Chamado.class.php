<?php
class Chamado {

    public  $cod_status;
    public  $cod_servico;
    public  $descricao;
    public  $data_inicial;
    public  $data_final;
    public  $cod_tecnico;
    public  $cod_solicitante;

    public function __construct ($cod_status,  $cod_servico,  $descricao,
                     $data_inicial,  $data_final,  $cod_tecnico,
                     $cod_solicitante) {
            $this->setcod_status($cod_status);
            $this->setcod_servico($cod_servico);
            $this->setdescricao($descricao);
            $this->setdata_inicial($data_inicial);
            $this->setdata_final($data_final);
            $this->setcod_tecnico($cod_tecnico);
            $this->setcod_solicitante($cod_solicitante);
    }

    public function  getcod_status() {
            return $this->cod_status;
    }
    public function  setcod_status( $cod_status) {
            $this->cod_status = $cod_status;
    }
    public function  getcod_servico() {
            return $this->cod_servico;
    }
    public function  setcod_servico( $cod_servico) {
            $this->cod_servico = $cod_servico;
    }
    public function  getdescricao() {
            return $this->descricao;
    }
    public function  setdescricao( $descricao) {
            $this->descricao = $descricao;
    }
    public function  getdata_inicial() {
            return $this->data_inicial;
    }
    public function  setdata_inicial( $data_inicial) {
            $this->data_inicial = $data_inicial;
    }
    public function  getdata_final() {
            return $this->data_final;
    }
    public function  setdata_final( $data_final) {
            $this->data_final = $data_final;
    }
    public function  getcod_tecnico() {
            return $this->cod_tecnico;
    }
    public function  setcod_tecnico( $cod_tecnico) {
            $this->cod_tecnico = $cod_tecnico;
    }
    public function  getcod_solicitante() {
            return $this->cod_solicitante;
    }
    public function  setcod_solicitante( $cod_solicitante) {
            $this->cod_solicitante = $cod_solicitante;
    }	
}
?>

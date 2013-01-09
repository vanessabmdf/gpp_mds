<?php
class Chamado {

    private  $cod_status = null;
    private  $cod_servico = null;
    private  $descricao = null;
    private  $data_inicial = null;
    private  $data_final = null;
    private  $cod_tecnico = null;
    private  $cod_solicitante = null;

    public function Chamado () {
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

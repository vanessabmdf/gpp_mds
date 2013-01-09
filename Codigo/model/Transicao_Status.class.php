<?php
class Transicao_Status {

    private  $cod_status_origem = null;
    private  $cod_status_destino = null;

    public function Transicao_Status() {
    }
    public function  getcod_status_origem() {
            return $this->cod_status_origem;
    }
    public function  setcod_status_origem( $cod_status_origem) {
            $this->cod_status_origem = $cod_status_origem;
    }
    public function  getcod_status_destino() {
            return $this->cod_status_destino;
    }
    public function  setcod_status_destino( $cod_status_destino) {
            $this->cod_status_destino = $cod_status_destino;
    }	
}
?>

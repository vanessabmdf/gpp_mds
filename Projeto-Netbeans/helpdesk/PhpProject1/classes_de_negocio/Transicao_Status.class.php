<?php
class Transicao_Status {

    public  $cod_status_origem;
    public  $cod_status_destino;

    public function __constructor( $cod_status_origem,  $cod_status_destino) {
            $this->setcod_status_origem($cod_status_origem);
            $this->setcod_status_destino($cod_status_destino);
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

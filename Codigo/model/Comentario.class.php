<?php
class Comentario {

    private $codigo = null;
    private  $descriçao = null;
    private  $cod_comentario = null;
    
    public function Comentario(){
    }
    public function  getcodigo() {
            return $this->codigo;
    }
    public function  setcodigo( $codigo) {
            $this->codigo = $codigo;
    }
    public function  getdescriçao() {
            return $this->descriçao;
    }
    public function  setdescriçao( $descriçao) {
            $this->descriçao = $descriçao;
    }
    public function  getcod_comentario() {
            return $this->cod_comentario;
    }
    public function  setcod_comentario( $cod_comentario) {
            $this->cod_comentario = $cod_comentario;
    }	
}

?>

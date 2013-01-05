<?php
class Comentario {

    public  $codigo;
    public  $descriçao;
    public  $cod_comentario;
    
    public function __constructor( $codigo,  $descriçao,  $cod_comentario) {
            $this->setcodigo($codigo);
            $this->setdescriçao($descriçao);
            $this->setcod_comentario($cod_comentario);
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

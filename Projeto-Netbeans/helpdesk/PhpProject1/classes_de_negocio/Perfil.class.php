<?php

class Perfil {

    public  $codigo;
    public  $tipo;

    public function __construct( $codigo,  $tipo) {
            $this->setcodigo($codigo);
            $this->settipo($tipo);
    }
    public function  getcodigo() {
            return $this->codigo;
    }
    public function  setcodigo( $codigo) {
            $this->codigo = $codigo;
    }
    public function  gettipo() {
            return $this->tipo;
    }
    public function  settipo( $tipo) {
            $this->tipo = $tipo;
    }
}
?>

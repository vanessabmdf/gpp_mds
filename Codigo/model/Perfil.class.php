<?php

class Perfil {

    private $codigo = NULL;
    private $tipo = NULL;

    public function perfil() {
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

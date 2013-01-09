<?php
class Solucao {

    private $codigo = null;
    private $descricao = null;
    private $data = null;
    
    public function Solucao(){
    }
    public function  getcodigo() {
            return $this->codigo;
    }
    public function  setcodigo( $codigo) {
            $this->codigo = $codigo;
    }
    public function  getdescricao() {
            return $this->descricao;
    }
    public function  setdescricao( $descricao) {
            $this->descricao = $descricao;
    }
    public function  getdata() {
            return $this->data;
    }
    public function  setdata( $data) {
            $this->data = $data;
    }
}

?>

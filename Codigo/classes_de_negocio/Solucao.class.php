<?php
class Solucao {

    public  $codigo;
    public  $descricao;
    public  $data;
    public function __contructor( $codigo,  $descricao,  $data) {
            $this->setcodigo($codigo);
            $this->setdescricao($descricao);
            $this->setdata($data);
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

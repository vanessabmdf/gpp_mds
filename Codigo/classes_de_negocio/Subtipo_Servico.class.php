<?php
class Subtipo_servico {

    public  $codigo;
    public  $descricao;
    public  $cod_tipo_servico;

    public function __constructor( $codigo,  $descricao,  $cod_tipo_servico) {
            $this->setcodigo($codigo);
            $this->setdescricao($descricao);
            $this->setcod_tipo_servico($cod_tipo_servico);
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
    public function  getcod_tipo_servico() {
            return $this->cod_tipo_servico;
    }
    public function  setcod_tipo_servico( $cod_tipo_servico) {
            $this->cod_tipo_servico = $cod_tipo_servico;
    }
}
?>

<?php
class Tipo_Servico {

    public  $codigo ;
    public  $descricao;

    public function __construct( $codigo,  $descricao) {
            $this->setcodigo($codigo);
            $this->setdescricao($descricao);
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

}

?>

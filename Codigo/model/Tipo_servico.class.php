<?php
class Tipo_Servico {

    private $codigo = null;
    private $descricao = null;

    public function Tipo_Servico(){
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

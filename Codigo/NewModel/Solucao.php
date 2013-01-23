<?php

class Solucao
{
    private $codigo;
    private $descricao;
    private $data;
    
    function __construct($codigo, $descricao, $data) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->data = $data;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }
}
?>

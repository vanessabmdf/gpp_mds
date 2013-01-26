<?php

class Status
{
    private $codigo;
    private $nome;
   
    function __construct($codigo, $nome) {
        $this->codigo = $codigo;
        $this->nome = $nome;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>

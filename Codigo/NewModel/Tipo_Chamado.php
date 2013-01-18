<?php

class Tipo_Chamado
{
    private $codigo;
    private $descricao;
    
    //A classe Tipo_Chamado tem que ser cadastrada pelo tecnico ou gererente do sistema.
    //Tava pensando em fazer herança, a classe Chamado herdasse da classe Tipo_Chamado. O que vcs acham?
    
    function __construct($codigo, $descricao) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
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
}
?>

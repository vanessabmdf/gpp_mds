<?php

class Comentario 
{
    private $codigo;
    private $descricao;
    private $chamado;
    private $usuario;
    
    function __construct($codigo, $descricao, $chamado, $usuario) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->chamado = $chamado;
        $this->usuario = $usuario;
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

    public function getChamado() {
        return $this->chamado;
    }

    public function setChamado($chamado) {
        $this->chamado = $chamado;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }



}

?>

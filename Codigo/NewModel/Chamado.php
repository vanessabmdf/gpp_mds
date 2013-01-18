<?php

include '../NewModel/Usuario.php';

class Chamado
{
    private $codigo;
    private $data_inicial;
    private $data_final;
    private $descricao;
    private $comentarioChamado;
    private $solicitante;
    private $tecnico;
    private $status;
    private $solucao;
    private $tipoChamado;
    
    function __construct($codigo, $data_inicial, $data_final, $descricao, $solicitante, $tecnico, $status, $tipoChamado) {
        $this->codigo = $codigo;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
        $this->descricao = $descricao;
        $this->solicitante = $solicitante;
        $this->tecnico = $tecnico;
        $this->status = $status;
        $this->tipoChamado = $tipoChamado;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getData_inicial() {
        return $this->data_inicial;
    }

    public function setData_inicial($data_inicial) {
        $this->data_inicial = $data_inicial;
    }

    public function getData_final() {
        return $this->data_final;
    }

    public function setData_final($data_final) {
        $this->data_final = $data_final;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getComentarioChamado() {
        return $this->comentarioChamado;
    }

    public function setComentarioChamado($comentarioChamado) {
        $this->comentarioChamado = $comentarioChamado;
    }

    public function getSolicitante() {
        return $this->solicitante;
    }

    public function setSolicitante($solicitante) {
        $this->solicitante = $solicitante;
    }

    public function getTecnico() {
        return $this->tecnico;
    }

    public function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getSolucao() {
        return $this->solucao;
    }

    public function setSolucao($solucao) {
        $this->solucao = $solucao;
    }

    public function getTipoChamado() {
        return $this->tipoChamado;
    }

    public function setTipoChamado($tipoChamado) {
        $this->tipoChamado = $tipoChamado;
    }
    
}

?>

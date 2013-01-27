<?php

class Chamado
{
    private $codigo;
    private $data_inicial;
    private $data_final;
    private $descricao;
    private $solicitante;
    private $tecnico;
    private $status;
    private $solucao;
    private $tipoChamado;
    private $local_equipamento;
    private $equip_patrimonio;
    
    function __construct($codigo, $data_inicial, $data_final, $descricao, $solicitante, $tecnico, $status, $solucao, $tipoChamado, $local_equipamento, $equip_patrimonio) {
        $this->codigo = $codigo;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
        $this->descricao = $descricao;
        $this->solicitante = $solicitante;
        $this->tecnico = $tecnico;
        $this->status = $status;
        $this->solucao = $solucao;
        $this->tipoChamado = $tipoChamado;
        $this->local_equipamento = $local_equipamento;
        $this->equip_patrimonio = $equip_patrimonio;
    }
    
    public function getLocal_equipamento() {
        return $this->local_equipamento;
    }

    public function setLocal_equipamento($local_equipamento) {
        $this->local_equipamento = $local_equipamento;
    }

    public function getEquip_patrimonio() {
        return $this->equip_patrimonio;
    }

    public function setEquip_patrimonio($equip_patrimonio) {
        $this->equip_patrimonio = $equip_patrimonio;
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

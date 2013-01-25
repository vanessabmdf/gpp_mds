<?php

class Usuario
{
    private $codigo;
    private $login;
    private $senha;
    private $nome;
    private $email;
    private $matricula;
    private $local_patrimonio;
    private $numero_parimonio;
    
       //O código tem que ser gerado pelo sistema, e não pode ser informado pelo usuário no ato do cadastro.
    /*Agente pode fazer um cod. sequencial de acordo com os usuarios que forem sendo cadastrados
     * por exemplo: 01, 02, 03, 04, 05, ...
     */    
    function __construct($codigo, $login, $senha, $nome, $email, $matricula, $local_patrimonio, $numero_parimonio) {
        $this->codigo = $codigo;
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->email = $email;
        $this->matricula = $matricula;
        $this->local_patrimonio = $local_patrimonio;
        $this->numero_parimonio = $numero_parimonio;
    }

    public function getLocal_patrimonio() {
        return $this->local_patrimonio;
    }

    public function setLocal_patrimonio($local_patrimonio) {
        $this->local_patrimonio = $local_patrimonio;
    }

    public function getNumero_parimonio() {
        return $this->numero_parimonio;
    }

    public function setNumero_parimonio($numero_parimonio) {
        $this->numero_parimonio = $numero_parimonio;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }   
}
?>

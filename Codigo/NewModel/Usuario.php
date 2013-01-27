<?php

class Usuario
{
    private $codigo;
    private $login;
    private $senha;
    private $nome;
    private $email;
    private $matricula;

    
    function __construct($codigo, $login, $senha, $nome, $email, $matricula) {
        $this->codigo = $codigo;
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->email = $email;
        $this->matricula = $matricula;
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

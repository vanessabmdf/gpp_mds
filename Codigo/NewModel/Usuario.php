<?php

class Usuario
{
    private $codigo;
    private $tipo;
    private $login;
    private $senha;
    private $nome;
    private $email;
    private $matricula;
    private $data_nascimento;
    
    //O código tem que ser gerado pelo sistema, e não pode ser informado pelo usuário no ato do cadastro.
    /*Agente pode fazer um cod. sequencial de acordo com os usuarios que forem sendo cadastrados
     * por exemplo: 01, 02, 03, 04, 05, ...
     */
    function __construct($tipo, $login, $senha, $nome, $email, $matricula, $data_nascimento) {
        $this->tipo = $tipo;
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->email = $email;
        $this->matricula = $matricula;
        $this->data_nascimento = $data_nascimento;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
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

    public function getData_nascimento() {
        return $this->data_nascimento;
    }

    public function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }    
}
?>

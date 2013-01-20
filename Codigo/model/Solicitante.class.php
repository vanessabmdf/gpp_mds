<?php

class Solicitante{
    
    private $nome = NULL;
    private $email = NULL;
    private $matricula = NULL;
    private $data_nascimento = NULL;
    private $nome_usuario = NULL;
    private $senha_usuario = NULL;
    
    public function Solicitante() {
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }
    
    public function  setMatricula($matricula){
        $this->matricula= $matricula;
    }
    public function  getMatricula(){
        return $this->matricula;
    }    
    public function setData($data_nascimento){
        $this->data_nascimento=$data_nascimento;
    }
    public function getData(){
        return $this->data_nascimento;
    }
    public function setNomeUsuario($data_nascimento){
        $this->data_nascimento=$data_nascimento;
    }
    public function getNomeUsuario(){
        return $this->data_nascimento;
    }
    public function setSenhaUsuario($data_nascimento){
        $this->data_nascimento=$data_nascimento;
    }
    public function getSenhaUsuario(){
        return $this->data_nascimento;
    }
}
?>

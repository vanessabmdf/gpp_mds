<?php

class Solicitante{
    
    private $nome = NULL;
    private $email = NULL;
    private $matricula = NULL;
    private $data_nascimento = NULL;
    
    public function solicitante() {
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
}
?>

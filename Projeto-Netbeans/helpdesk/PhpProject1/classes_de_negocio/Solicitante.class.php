<?php

class Solicitante{
    public $nome;
    public $email;
    public $matricula;
    public $data_nascimento;
    
    public function __construct( $nome, $email, $matricula, $data_nascimento ) {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setMatricula($matricula);
        $this->setData($data_nascimento);
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

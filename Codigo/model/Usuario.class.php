<?php

class Usuario{
    
    private $nome_usuario = null;
    private $senha = null;
    private $perfil = null;
    private $solicitante = null;
    
    public function Usuario() {
    }

    public function setNome($nome_usuario){
        $this->nome_usuario=$nome_usuario;
    }
    public function  getNome(){
        return $this->nome_usuario;
    }
    
    public function setSenha($senha){
        $this->senha=$senha;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function setPerfil($perfil){
        $this->perfil=$perfil;
    }
    public function getPerfil(){
        return $this->perfil;
    }
    
    public function setSolicitante($solicitante){
        $this->solicitante=$solicitante;
    }
    public function getSolicitante(){
        return $this->solicitante;
    }
}
?>

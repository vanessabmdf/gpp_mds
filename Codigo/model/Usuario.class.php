<?php

class Usuario{
    
    private $nome_usuario = null;
    private $senha = null;
    private $codigo_perfil = null;
    private $codigo_solicitante = null;
    
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
    
    public function setCod($codigo){
        $this->codigo_perfil=$codigo;
    }
    public function getCod(){
        return $this->codigo_perfil;
    }
    
    public function setCodigo_solicitante($codigo_solicitante){
        $this->codigo_solicitante=$codigo_solicitante;
    }
    public function getCodigo_solicitante(){
        return $this->codigo_solicitante;
    }
}
?>

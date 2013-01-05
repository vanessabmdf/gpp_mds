<?php

class Usuario{
    public $nome_usuario;
    public $senha;
    public $codigo_perfil;
    
    public function __construct($nome_usuario, $senha, $codigo_perfil) {
        $this->setNome($nome_usuario);
        $this->setSenha($senha);
        $this->setCod($codigo_perfil);
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
}
?>

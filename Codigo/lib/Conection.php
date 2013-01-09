<?php

// Utilização do PDO, que significa PHP Data Object, que significa uma abstração de drivers
// Caso seja necessário, pode-se trocar o SGBD com poucas linhas
class Conection extends PDO {
    
    private $hostname = "mysql:host=127.0.0.1;dbname=helpdeskfga";
    private $user = "root";
    private $pass = "";
    public $hdl = null;

    function __construct() {
        try {            
            if ($this->hdl == null) {
                //Inicialização de um construtor da classe pai. 
                //É necessário utilizar o parent, pois a classe filha está definindo um construtor
                $bd = parent::__construct($this->hostname, $this->user, $this->pass);
                $this->hdl = $bd;
                return $this->hdl;
            }
        } catch (PDOException $erro) {
                echo "Erro na conexão, informe o erro ao CPD: " . $erro->getMessage();
            return false;
        }
    }

    //Destrutor da conexão
    function __destruct() {
        if (!($this->hdl == null)) {
            $this->hdl = NULL;
        }
    }

}

?>
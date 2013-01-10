<?php

class banco {

    private $conn;
    private $db;
    private $query;
    private $data;
    public $_res;

    function __construct($cnn, $base) {
        $this->conn = $cnn;
        $this->db = $base;
    }

    function seleciona($tabela) {
        $this->query = "SELECT * FROM $tabela ORDER BY FO_TX_DS ASC";
        $result = mysql_query($this->query) or die('Nao foi possivel selecionar na base');
        return $result;
    }

    function cnpjRepetido($tabela, $cnpj) {
        $this->query = "SELECT * FROM $tabela WHERE FO_NR_CNPJ = '$cnpj'"; //monto a query
        $result = mysql_query($this->query) or die("Nao foi possivel inserir o registro na base");

        if (mysql_num_rows(mysql_query($this->query)) > 0)//se retornar algum resultado
            echo 'true';
        else
            echo 'false';

        return $result;
    }

    function insere($tabela, $campos, $valores) {
        $this->query = "INSERT INTO $tabela $campos VALUES $valores";
        mysql_query($this->query) or die("Nao foi possivel inserir o registro na base");
        if (mysql_affected_rows() == 1) {
            $this->_res = true;
        } else {
            $this->_res = false;
        }
    }

    function apaga($tabela, $id) {
        $this->query = "DELETE FROM $tabela WHERE FO_NR_ID=$id";
        mysql_query($this->query) or die("Nao foi possivel apagar o registro na base");
    }

    function altera($tabela, $alteracao, $id) {
        $this->query = "UPDATE $tabela SET $alteracao WHERE FO_NR_ID=$id";
        $this->_res = mysql_query($this->query) or die("Nao foi possivel alterar o registro na base");
        if (mysql_affected_rows() > 0) {
            $this->_res = "Dados alterados com sucesso!";
        } else {
            $this->_res = "Dados não foram alterados!";
        }
    }

    public function GetRes() {
        return $this->_res;
    }

}

?>
<?php

class Status
{
    private $codigo;
    private $nome;
    
    /*A classe usuario tem que ser construída pelo sistema. Exemplo:
     * codigo = 1 -> Aberto 
     * codigo = 2 -> Em Andamento
     * codigo = 3 -> Concluido
     * 
     * O padrão da classe status seria esse. O atributo nome representa o status do chamado.
     * O construtor seria iniciado sempre da seguinte forma:
     * 
     * New Status(1, "Aberto"); -> Ou seja, o chamado sempre inicia em aberto.
     * 
     * É so uma sugestão, qualquer alteração que acharem necessaria, façam e avisem no grupo.
     */
    function __construct($codigo, $nome) {
        $this->codigo = $codigo;
        $this->nome = $nome;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>

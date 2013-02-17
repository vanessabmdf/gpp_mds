<?php

require_once "../../controller/ChamadoCtrl.php";
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-15 at 19:13:25.
 */
class ChamadoCtrlTest extends PHPUnit_Framework_TestCase {

    /**
     * @var ChamadoCtrl
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new ChamadoCtrl();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        unset($this->object);
    }

    /**
     * @covers ChamadoCtrl::insChamado
     * @todo   Implement testInsChamado().
     */
    public function testInsChamado() {
        $resultado = $this->object->insChamado("Defeito no computador.", "joaosilva", 1, 1, "Sala I9.", "ab3343f");
        $this->assertEquals(true, $resultado, "A inserção de um chamado no BD falhou!");
    }

    /**
     * @covers ChamadoCtrl::alteraChamado
     * @todo   Implement testAlteraChamado().
     */
    public function testAlteraChamado() {
        $resultado = $this->object->alteraChamado(1, "marcossilva", 2);
        $this->assertEquals(true, $resultado, "A alteração de um chamado falhou!");
        //Testando a finalização do chamado.
        $resultado2 = $this->object->alteraChamado(1, NULL, 3);
        $this->assertEquals(true, $resultado2, "A finalização de um chamado falhou!");
    }

     /**
     * @covers ChamadoCtrl::obterChamadoPorStatus
     * @todo   Implement testObterChamadoPorStatus().
     */
    
    public function testObterChamadoPorStatus()
    {
        $resultado = $this->object->obterChamadoPorStatus(1);
        foreach ($resultado as $row){
            $this->assertArrayHasKey("cod", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("data_inicial", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("data_final", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("descricao", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("usuario_login", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("login_tecnico", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("desc_status", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("desc_tipo_chamado", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("localizacao_equip", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("patrimonio_equip", $row, "A listagem de todos os chamados falhou!");  
        }
    }
    
    /**
     * @covers ChamadoCtrl::obterChamado_Especifico
     * @todo   Implement testObterChamado_Especifico().
     */
    public function testObterChamado_Especifico() {
        $resultado = $this->object->obterChamado_Especifico(1);
        if($resultado!=false)
           $resultado = true;
       $this->assertEquals(true, $resultado, "A obtenção de um chamado falhou!");
    }

    /**
     * @covers ChamadoCtrl::listaChamado
     * @todo   Implement testListaChamado().
     */
    public function testListaChamado() {
        $resultado = $this->object->listaChamado();
        foreach ($resultado as $row){
            $this->assertArrayHasKey("cod", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("tipo_cod", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("usuario_login", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("descricao", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("data_inicial", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("data_final", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("patrimonio_equip", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("localizacao_equip", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("login_tecnico", $row, "A listagem de todos os chamados falhou!");
            $this->assertArrayHasKey("status_cod", $row, "A listagem de todos os chamados falhou!");
        }
    }

    /**
     * @covers ChamadoCtrl::deletarChamado
     * @todo   Implement testDeletarChamado().
     */
    public function testDeletarChamado() {
        $resultado = $this->object->deletarChamado(1);
        $this->assertEquals(true, $resultado, "A remoção de um chamado falhou!");
    }

}

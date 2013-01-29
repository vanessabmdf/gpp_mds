<?php
require_once '..\..\controller\SolucaoCtrl.php';
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-27 at 01:34:40.
 */

//Necessita da tabela solucao(cod, descricao, dt_solucao) criada no banco de dados para executar os testes.

class SolucaoCtrlTest extends PHPUnit_Framework_TestCase {

    /**
     * @var SolucaoCtrl
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new SolucaoCtrl();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        unset($this->object);
    }

    /**
     * @covers SolucaoCtrl::insSolucao
     * @todo   Implement testInsSolucao().
     */
    public function testInsSolucao() {
        $resultado = $this->object->insSolucao(null, "Teste.", null);
        $this->assertEquals(true, $resultado, "A insercao da solucao falhou.");      
    }

    /**
     * @covers SolucaoCtrl::obterSolucao_Especifico
     * @todo   Implement testObterSolucao_Especifico().
     */
    public function testObterSolucao_Especifico() {
        $resultado = $this->object->obterSolucao_Especifico(1);
        if($resultado != false)
            $resultado = true;
        $this->assertEquals(true, $resultado, "A obtencao de uma solucao especifica falhou.");
    }
    
    /**
     * @covers SolucaoCtrl::alteraSolucao
     * @todo   Implement testAlteraSolucao().
     */
    public function testAlteraSolucao() {
         $resultado = $this->object->alteraSolucao(null, "altera solucao.", null, 1);
         $this->assertEquals(true, $resultado, "A alteracao de uma solucao falhou.");

    }
    
    /**
     * @covers SolucaoCtrl::listaSolucao
     * @todo   Implement testListaSolucao().
     */
    public function testListaSolucao() {
        $resultado = $this->object->listaSolucao();
        foreach ($resultado as $row){
            $this->assertArrayHasKey("cod", $row, "Não foi possível listar todas as soluções!");
            $this->assertArrayHasKey("descricao", $row, "Não foi possível listar todas as soluções!");
            $this->assertArrayHasKey("dt_solucao", $row, "Não foi possível listar todas as soluções!");
        }
    }
    
    /**
     * @covers SolucaoCtrl::delSolucao
     * @todo   Implement testDelSolucao().
     */
    public function testDelSolucao() {
        $resultado = $this->object->delSolucao(1);
        $this->assertEquals(true, $resultado, "A delecao da solucao falhou.");
    }

    
    
}

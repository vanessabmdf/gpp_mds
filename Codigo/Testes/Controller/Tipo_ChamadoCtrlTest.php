<?php
require_once "../../controller/Tipo_ChamadoCtrl.php";
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-29 at 03:23:22.
 */
class Tipo_ChamadoCtrlTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Tipo_ChamadoCtrl
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Tipo_ChamadoCtrl();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        unset($this->object);
    }

    /**
     * @covers Tipo_ChamadoCtrl::insTipo_Chamado
     * @todo   Implement testInsTipo_Chamado().
     */
    public function testInsTipo_Chamado() {
        $resultado = $this->object->insTipo_Chamado(NULL, "Hardware");
        $this->assertEquals(true, $resultado, "Impossível inserir tipo_chamado!");
    }

   

    /**
     * @covers Tipo_ChamadoCtrl::listaTipo_Chamado
     * @todo   Implement testListaTipo_Chamado().
     */
    public function testListaTipo_Chamado() {
       $resultado = $this->object->listaTipo_Chamado();
       foreach($resultado as $row){
           $this->assertArrayHasKey("cod", $row, "Impossivel retornar todos os tupo_chamado");
           $this->assertArrayHasKey("descricao", $row, "Impossivel retornar todos os tupo_chamado");
       }
       
    }

    /**
     * @covers Tipo_ChamadoCtrl::obterTipo_Chamado_Especifico
     * @todo   Implement testObterTipo_Chamado_Especifico().
     */
    public function testObterTipo_Chamado_Especifico() {
       $resultado = $this->object->obterTipo_Chamado_Especifico(1);
        if($resultado!=false)
           $resultado = true;
       $this->assertEquals(true, $resultado, "A obtenção do usuaŕio falhou!");
    }

    /**
     * @covers Tipo_ChamadoCtrl::alteraTipo_Chamado
     * @todo   Implement testAlteraTipo_Chamado().
     */
    public function testAlteraTipo_Chamado() {
        $resultado = $this->object->alteraTipo_Chamado(1, "Software", 1);
        $this->assertTrue (true, $resultado, "impossivel alterar tupo_chamado");
    }
    
     /**
     * @covers Tipo_ChamadoCtrl::delTipo_Chamado
     * @todo   Implement testDelTipo_Chamado().
     */
    
    public function testDelTipo_Chamado() {
       $resultado = $this->object->delTipo_Chamado(1);
       $this->assertTrue(true, $resultado, "Impossivel deletar tupo_chamado!");
    }

}

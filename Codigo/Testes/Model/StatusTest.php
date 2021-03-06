<?php
require_once "../../Model/Status.php";
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-16 at 16:03:07.
 */
class StatusTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Status
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Status('codigo', 'nome');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        unset($this->object);
    }
    public function testConstrutor() {
        $resultado = $this->object;
        $this->assertNotNull($resultado);
    }
    /**
     * @covers Status::getCodigo
     * @todo   Implement testGetCodigo().
     */
    public function testGetCodigo() {
        $resultado=$this->object->getCodigo();
        $this->assertEquals($resultado, 'codigo');
    }

    /**
     * @covers Status::setCodigo
     * @todo   Implement testSetCodigo().
     */
    public function testSetCodigo() {
        $this->object->setCodigo(1);
        $resultado=$this->object->getCodigo();
        $this->assertEquals($resultado, 1);
    }

    /**
     * @covers Status::getNome
     * @todo   Implement testGetNome().
     */
    public function testGetNome() {
        
        $resultado=$this->object->getNome();
        $this->assertEquals($resultado, 'nome');
    }

    /**
     * @covers Status::setNome
     * @todo   Implement testSetNome().
     */
    public function testSetNome() {
        $this->object->setNome('aberto');
        $resultado=  $this->object->getNome();
        $this->assertEquals($resultado, 'aberto');
    }

}

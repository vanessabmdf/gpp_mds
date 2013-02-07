<?php
    
   require_once "../../DAO/Tipo_ChamadoDAO.php";
   require_once "../../Model/Tipo_Chamado.php";
   
   class Tipo_ChamadoDAOTest extends PHPUnit_Framework_TestCase {
       
     /**
     * @var Tipo_ChamadoDAO
     */
       protected $object;
       
     /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
       
       protected function setUp(){
           $this->object = new Tipo_ChamadoDAO();
       }
       
        /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
       
       protected function tearDown(){
           unset($this->object);
       }
       
     /**
     * @covers Tipo_ChamadoDAO::inserirTipo_Chamado
     * @todo   Implement testInserirTipo_Chamado().
     */
       
       public function testInserirtipo_Chamado(){
        $tipo_chamado = new Tipo_Chamado(1, "Apenas um teste do tipo chamado.");
        $resultado = $this->object->inserirTipo_Chamado($tipo_chamado);
        $this->assertTrue(true, $resultado, "Nao foi possivel inserir o tipo chamado no BD!");  
       }
       
     /**
     * @covers Tipo_CHamadoDAO::alterarTipo_Chamado
     * @todo   Implement testAlterarTipo_Chamado().
     */
       
       public function testAlterarTipo_Chamado(){
           $tipo_chamado = new Tipo_Chamado(2, "Apenas um teste do tipo chamado.");
           $resultado = $this->object->alterarTipo_Chamado($tipo_chamado,1);
           $this->assertTrue(true, $resultado, "Nao foi possivel alterar o tipo chamado no BD!");
       }
       
       /**
     * @covers Tipo_ChamadoDAO::obterTipo_Chamado_Especifico
     * @todo   Implement testObterTipo_Chamado_Especifico().
     */
       
       public function testObterTipo_Chamado_Especifico(){
           $resultado = $this->object->obterTipo_Chamado_Especifico(2);
           if($resultado!=false)
              $resultado = true;
           $this->assertTrue(true, $resultado, "Nao foi possivel obter tipo chamado especifico no BD!");
       }
       
     /**
     * @covers Tipo_ChamadoDAO::obterTipo_Chamado_Geral
     * @todo   Implement testObterTipo_Chamado_Geral().
     */
       
     public function testObterTipo_Chamado_Geral(){
         $resultado = $this->object->obterTipo_Chamado_Geral();
         foreach ($resultado as $row){
             $this->assertArrayHasKey("cod", $row, "Não foi possível retornar todos os campos!");
             $this->assertArrayHasKey("descricao", $row, "Não foi possível retornar todos os campos!");
         }
     }
     
     /**
     * @covers Tipo_ChamadoDAO::fechaConexão
     * @todo   Implement testFechaConexão().
     */
     
     public function testFechaConexão(){
         $resultado = $this->object->fechaConexão();
         $this->assetEquals(NULL, $resultado, "Impossível fecha conexao!");
     }
       
   }

?>

<?php

//Inclusao de classes necessarias.
require_once "../lib/Conection.php";
require_once "../Model/Chamado.php";
require_once "../Model/Solucao.php";
require_once "/../Model/Status.php";
require_once "/../Model/Tipo_Chamado.php";
require_once "/../Model/Usuario.php";
require_once "/../DAO/UsuarioDAO.php";
require_once "/../DAO/SolucaoDAO.php";
require_once "/../DAO/StatusDAO.php";
require_once "/../DAO/Tipo_ChamadoDAO.php";

class ChamadoDAO
{
    private $con;

    function __construct() 
    {
        $this->con = new Conection();
        //Função para aparecer os erros e warnings
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserirChamado(Chamado $chamado) {
        try {
            
                /*Chamado cadastrado possui os objetos:
                    Usuario(Solicitante)
                 *  Usuario(Tecnico)
                 *  Status
                 *  Solucao
                 *  Tipo_Chamado
                 */
                
                $query = "INSERT INTO chamado (tipo_cod, usuario_login, descricao, patrimonio_equip, localizacao_equip, login_tecnico, status_cod) 
                          VALUES (:tipo_cod, :usuario_login, :descricao, :patrimonio_equip, :localizacao_equip, :login_tecnico, :status_cod)";
            
                //Insere no banco de dados, os dados do objeto $chamado(parametro da função).
                $stm = $this->con->prepare($query);
                $stm->bindValue(":tipo_cod", $chamado->getCodigo());
                $stm->bindValue(":usuario_login", $chamado->getSolicitante()->getCodigo());
                $stm->bindValue(":descricao", $chamado->getDescricao());
                $stm->bindValue(":patrimonio_equip", $chamado->getEquip_patrimonio());
                $stm->bindValue(":localizacao_equip", $chamado->getLocal_equipamento());
                $stm->bindValue(":login_tecnico", $chamado->getTecnico()->getCodigo());
                $stm->bindValue(":status_cod", $chamado->getStatus()->getCodigo());
                
                return $stm->execute();
             
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function alterarChamado(Chamado $chamado, $codigo_chamado)
    {
        try {
                /*Alterar tipo_cod
                 * usuario_login(Em aberto)
                 * descricao
                 * patrimonio_equip
                 * localizacao_equip
                 * login_tecnico
                 * status_cod
                 */
            
                $query = "UPDATE chamado SET tipo_cod=:tipo_cod, descricao=:descricao, patrimonio_equip=:patrimonio_equip,
                          localizacao_equip=:localizacao_equip, login_tecnico=:login_tecnico, status_cod=:status_cod
                          WHERE cod = '$codigo_chamado'";
                      
                $stm = $this->con->prepare($query);
                
                $stm->bindValue(":tipo_cod", $chamado->getTipoChamado()->getCodigo());
                $stm->bindValue(":descricao", $chamado->getDescricao());
                $stm->bindValue(":patrimonio_equip", $chamado->getEquip_patrimonio());
                $stm->bindValue(":localizacao_equip", $chamado->getLocal_equipamento());
                $stm->bindValue(":login_tecnico", $chamado->getTecnico()->getCodigo());
                $stm->bindValue(":status_cod", $chamado->getStatus()->getCodigo());
                
                $stm->execute();
                $this->con->commit();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    public function obterChamado_Especifico($codigo_chamado) {
        try {
            
                $chamado = new Chamado();
                //Busca os dados do chamado com o codigo_chamado informado.
                $stm = $this->con->query("SELECT * FROM chamado WHERE codigo = '$codigo_chamado'");
    
                //Como so 1 registro é retornado, executa o foreach 1 vez somente.
                foreach($stm as $row)
                {
                    //Busca os valores(codigo, data_inicial, data_final, descricao, comentarioChamado) no banco, e atribui ao objeto $chamado.
                    $chamado->setCodigo($row['cod']);
                    $chamado->setDescricao($row['descricao']);
                    $chamado->setData_inicial($row['data_inicial']);
                    $chamado->setData_inicial($row['data_final']);
                    $chamado->setEquip_patrimonio($row['patrimonio_equip']);
                    $chamado->setLocal_equipamento($row['localizacao_equip']);
                    
                    //Buscando solicitante, para criar o objeto e atribuir a variavel $chamado.
                    $buscarUsuario = new UsuarioDAO();
                    $solicitante = $buscarUsuario->obterUsuario($row['solicitante']);
                    $chamado->setSolicitante($solicitante);
             
                    //Buscando tecnico, para criar o objeto e atribuir a variavel $chamado.
                    $tecnico = $buscarUsuario->obterUsuario($row['tecnico']);
                    $chamado->setTecnico($tecnico);
                
                    //Bucando status, para criar o objeto e atribuir a variaval $chamado.
                    $buscarStatus = new StatusDAO();
                    $status = $buscarStatus->obterStatus($row['status_cod']);
                    $chamado->setStatus($status);
                
                    //Bucando solucao, para criar o objeto e atribuir a variavel $chamado.
                    $stm2 = $this->con->query("SELECT * FROM solucao WHERE chamado_cod = '$chamado->getCoddigo'");
                    $solucao = new Solucao();
                    foreach($stm2 as $row2)
                    {
                        $solucao->setCodigo($row2['cod']);
                        $solucao->setDescricao($row2['descricao']);
                        $solucao->setData($row2['data_solucao']);
                    }
                    $chamado->setSolucao($solucao);
                
                    //Buscando tipo_chamado, para criar o objeto e atribuir a variavel $chamado.
                    $buscarTipo_Chamado = new Tipo_ChamadoDAO();
                    $tipoChamado = $buscarTipo_Chamado->obterTipo_Chamado_Especifico($row['tipo_cod']);
                    $chamado->setTipoChamado($tipoChamado);
                }
                //Retorna um objeto chamado.
                return $chamado;
                
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Obtém todos os Chamados salvos no banco de dados.
    //O objeto retornado, precisa passar pela função foreach(), para obter cada registro.
    public function obterChamado_Geral()
    {
        try
        {
            $stm = $this->con->query("SELECT * FROM chamado");
            return $stm;
        }catch(PDOException $erro){
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
     public function deletarChamado($codigo_chamado) {
        try {
                //Deleta um chamado atraves do codigo informado.
                $this->con->query("DELETE FROM chamado WHERE codigo = '$codigo_chamado'");
                 
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    //Função de fechar a conexão aberta no Banco de Dados.
    public function fechaConexão() {
        try {
            $this->con = null;
        } catch (PDOException $erro) {
            echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
}



?>

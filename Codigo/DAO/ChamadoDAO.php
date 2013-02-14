<?php

//Inclusao de classes necessarias.
require_once "../lib/Conection.php";
require_once "../Model/Chamado.php";
require_once "/../Model/Status.php";
require_once "/../Model/Tipo_Chamado.php";
require_once "/../Model/Usuario.php";
require_once "/../DAO/UsuarioDAO.php";
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
                $query = "INSERT INTO chamado (tipo_cod, usuario_login, descricao, patrimonio_equip, localizacao_equip, status_cod) 
                          VALUES (:tipo_cod, :usuario_login, :descricao, :patrimonio_equip, :localizacao_equip, :status_cod)";
            
                //Insere no banco de dados, os dados do objeto $chamado(parametro da função).
                $stm = $this->con->prepare($query);
                $stm->bindValue(":tipo_cod", $chamado->getCodigo());//Passa o cod ou a descricao???
                $stm->bindValue(":usuario_login", $chamado->getSolicitante());//Passa login do solicitante.
                $stm->bindValue(":descricao", $chamado->getDescricao());
                $stm->bindValue(":patrimonio_equip", $chamado->getEquip_patrimonio());
                $stm->bindValue(":localizacao_equip", $chamado->getLocal_equipamento());
                $stm->bindValue(":status_cod", $chamado->getStatus());//Passa o cod do status.
                
                return $stm->execute();
             
            } catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
        }
    }
    
    public function alterarChamado($codigo_chamado, $login_tecnico, $status_cod)
    {
        try {
                //Status_cod = 3 é o chamado FINALIZADO.
                //So executa se um chamado for FINALIZADO.
                if($status_cod == 3)
                {
                    //O Comando SELECT NOW() retorna a data atual do sistema.
                    $query = "UPDATE chamado SET status_cod=:status_cod, data_final = (SELECT NOW()) WHERE cod = '$codigo_chamado'";
                    $stm = $this->con->prepare($query);
                    
                    $stm->bindValue(":status_cod", $status_cod);
                    return $stm->execute();
                }
                
                $query = "UPDATE chamado SET login_tecnico=:login_tecnico, status_cod=:status_cod 
                          WHERE cod = '$codigo_chamado'";
                      
                $stm = $this->con->prepare($query);
                
                $stm->bindValue(":login_tecnico", $login_tecnico);
                $stm->bindValue(":status_cod", $status_cod);
               
                return $stm->execute();
                
            }catch (PDOException $erro) {
                echo "Ocorreu um erro na operação, informe o erro ao CPD: " . $erro->getMessage();
            }
    }
    
    public function obterChamado_Especifico($codigo_chamado) {
        try {
            
                $chamado = new Chamado();
                //Busca os dados do chamado com o codigo_chamado informado.
                $stm = $this->con->query("SELECT * FROM chamado WHERE cod = '$codigo_chamado'");
                
                //Se a consulta falhar.
                if($stm == false)
                    return $stm;
    
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
                return $this->con->query("DELETE FROM chamado WHERE cod = '$codigo_chamado'");
                 
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

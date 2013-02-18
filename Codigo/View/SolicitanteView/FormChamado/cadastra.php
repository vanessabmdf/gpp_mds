<?php
    require_once '../../../controller/ChamadoCtrl.php';
    if(isset($_POST['cadastrar'])){
        $tipoChamado     = $_POST['tipoChamado'];
        $loginUsuario   = $_POST['nomeUsuario'];
        $descricao      = $_POST['descricao'];
        $patrimonio     = $_POST['patrimonio'];
        $local          = $_POST['local'];
        $status         = $_POST['status'];
    
        $chamado = new ChamadoCtrl();

        $chamado->insChamado($descricao, $loginUsuario, $status, $tipoChamado, $local, $patrimonio);
    }
?>

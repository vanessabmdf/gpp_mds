<?php
    require_once '../../../controller/ChamadoCtrl.php';
    if(isset($_POST['cadastrar'])){
        $tipoChamado     = $_POST['tipoChamado'];
        $loginUsuario   = $_COOKIE['login_usuario'];
        $descricao      = $_POST['descricao'];
        $patrimonio     = $_POST['patrimonio'];
        $local          = $_POST['local'];
        $status         = $_POST['status'];
        
        
    
        $chamado = new ChamadoCtrl();

        $chamado->insChamado($descricao, $loginUsuario, $status, $tipoChamado, $local, $patrimonio);
    }
?>

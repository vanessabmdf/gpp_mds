<html>

<?php
require_once("../../../controller/Tipo_ChamadoCtrl.php");

$descricao=utf8_decode($_POST["descricao"]);
$tipo_Chamado = new Tipo_ChamadoCtrl();
$tipo_Chamado->insTipo_Chamado(NULL, $descricao);
?>

    </html>
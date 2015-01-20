<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');
extract($_POST);

$q =  "SELECT codigoServico,equipamento,marcaModelo,dataEntrada,descDefeito from entrada WHERE idCliente = ? ORDER BY dataEntrada DESC LIMIT 0,10";
if(!$sql = $mysqli->prepare($q)); echo $mysqli->error;
$sql->bind_param('i',$idCliente);
$sql->execute();
$sql->store_result();
$sql->bind_result($codigoServico,$equipamento,$marca,$entrada,$infoPreliminar);

while ($sql->fetch()){

    echo 'Ordem de serviço: ' .$codigoServico;
    echo '<br />'. 'equipamento: '. $equipamento;
    echo ' '.$marca;
    echo '<br />' . 'entrada: ' . $entrada;
    echo ' <br />' . ' Informações Preliminares: ' . $infoPreliminar;
    echo '<br /><br />';

}
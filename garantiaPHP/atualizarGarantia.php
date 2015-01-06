<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/
require_once('../configs/localMysql.php');
extract($_POST);

$query = "UPDATE garantia set periodo = ? WHERE codigoServico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('is',$novoPeriodo,$codigoServico);
$sql->execute();
$sql->store_result();
if($sql->affected_rows >0){
    echo $novoPeriodo;
}
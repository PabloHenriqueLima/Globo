<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/
require_once('../configs/configs.php');
extract($_POST);

$query = "DELETE FROM garantia WHERE codigoServico =?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoServico);
$sql->execute();
$sql->store_result();
if ($sql->affected_rows >0) {
    echo true;
}else {
    echo false;
}
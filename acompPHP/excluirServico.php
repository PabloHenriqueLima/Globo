<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once ('../configs/configs.php');

$query = "DELETE FROM entrada WHERE codigoServico = ?";
$deleteService = $_POST['codigoServico'];
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$deleteService);
$sql->execute();
$sql->store_result();
if($mysqli->affected_rows >= 1) {
    echo "Serviço deletado com sucesso.";
}else {
    echo "Serviço não cadastrado.";
}


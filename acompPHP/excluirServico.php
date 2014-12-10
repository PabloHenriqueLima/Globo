<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once ('../configs/configs.php');

$query = "DELETE FROM entrada WHERE codservico = ?";
$deleteService = $_POST['codigoServico'];
$sql = $mysqli->prepare($query);
$sql->bind_param('i',$deleteService);
$sql->execute();

echo "SERVIÇO DELETADO COM SUCESSO";
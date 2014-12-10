<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once ('../configs/configs.php');

$query = "DELETE FROM clientes WHERE id = ?";
$idDelete = $_POST['idCliente'];
$sql = $mysqli->prepare($query);
$sql->bind_param('i',$idDelete);
$sql->execute();
echo "Deletado com sucesso";

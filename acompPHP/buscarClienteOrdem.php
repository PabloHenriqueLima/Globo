<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');

$busca = $_GET['nomeCliente'];

$query = "SELECT id,nomeCliente FROM clientes WHERE nomeCliente LIKE CONCAT('%', ? , '%') LIMIT 0,5";

if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('s',$busca);
$sql->execute();
$sql->store_result();
$sql->bind_result($id,$nome);

while($sql->fetch()){
    $dados[] =  $nome.' '.'('.$id.')';
}
echo json_encode($dados,JSON_UNESCAPED_UNICODE);

$sql->close();

<?php
require_once ('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];

$query = "SELECT ent.equipamento,cli.nomeCliente FROM entrada ent INNER JOIN clientes cli ON ent.idCliente = cli.id WHERE codigoServico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($equipamento,$nomeCliente);
$sql->fetch();
if($sql->num_rows >= 1){
    $dados = ['equipamento'=>$equipamento,'cliente'=>$nomeCliente];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo false;
}

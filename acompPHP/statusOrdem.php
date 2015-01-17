<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');

$codigoServico = $_POST['codigoServico'];

$query = "SELECT idCliente,statusServico,equipamento from entrada WHERE codigoServico = ?";
if($sql = $mysqli->prepare($query)){
    echo $mysqli->error;
}
$sql->bind_param('s',$codigoServico);
if($sql->execute()){
    echo $mysqli->error;
}
$sql->store_result();
$sql->bind_result($idCliente,$statusAtualServico,$equipamento);
$sql->fetch();
if($sql->num_rows > 0){

    $query =  "SELECT nomeCLiente from clientes WHERE id = ?";
    if(!$sql = $mysqli->prepare($query)) echo $mysqli->error;
    $sql->bind_param('i',$idCliente);
    if(!$sql->execute()) echo $mysqli->error;
    $sql->store_result();
    $sql->bind_result($nomeCliente);
    $sql->fetch();


    $dados = ['statusAtual'=>$statusAtualServico,'equipamento'=>$equipamento,'cliente'=>$nomeCliente];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo false;
}

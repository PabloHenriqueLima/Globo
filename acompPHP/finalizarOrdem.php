<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');

extract($_POST);

$query = "SELECT codigoservico from saida WHERE codigoServico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoservico);
$sql-> execute();
$sql->store_result();
if($sql->num_rows >= 1) {
    echo "Ordem de serviço já finalizada.";
    exit();
}
if(!empty($garantiaDias)){
$x = 'x';
}else{
    $x = '';
}


$query = "INSERT INTO saida (codigoServico, preco, dataDaBaixa, descBaixa, garantia) VALUES (?,?,now(),?,?)";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('ssss',$codigoservico,$valorServico,$descServico,$x);
if(!$sql->execute()) echo $mysqli->error;

$query = "UPDATE entrada SET finalizado = ? WHERE codigoServico=?";
$sql->prepare($query);
$x = 'x';
$sql->bind_param('si',$x,$codigoservico);
$sql->execute();

if(!empty($garantiaDias)){

    $query = "INSERT INTO garantia (codigoServico, inicio, periodo) VALUES (?,now(),?)";
    if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
    $sql->bind_param('si',$codigoservico,$garantiaDias);
    if(!$sql->execute()) echo $mysqli->error;
}


echo 'A ordem de serviço foi finalizada com sucesso.';







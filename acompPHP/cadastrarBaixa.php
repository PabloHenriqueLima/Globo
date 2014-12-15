<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

extract($_POST);

$query = "SELECT codigoservico from saida WHERE codigoServico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoservico);
$sql-> execute();
$sql->store_result();
if($sql->num_rows >= 1) {
    echo "Já foi dado baixa nesse Serviço.";
    exit();
}




if(isset($gerargarantia) and $gerargarantia === "x"):
    $query = "INSERT INTO garantia (codigoServico, inicio, periodo) VALUES (?,now(),?)";
    if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
    $sql->bind_param('si',$codigoservico,$garantia);
    if($sql->execute()){}else{echo $mysqli->error;}
else:
endif;
if(!isset($gerargarantia)){
    $gerargarantia = " ";
}
$query = "INSERT INTO saida (codigoServico, preco, dataDaBaixa, descBaixa, garantia) VALUES (?,?,now(),?,?)";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('ssss',$codigoservico,$valorServico,$descServico,$gerargarantia);
if ($sql->execute()):
    else: echo $mysqli->error; endif;

$query = "UPDATE entrada SET finalizado = ? WHERE codigoServico=?";
$sql->prepare($query);
$x = 'x';
$sql->bind_param('si',$x,$codigoservico);
$sql->execute();
echo 'A baixa foi registrada com sucesso no sistema !';

<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/MysqlChange.php');
$con = new MysqlChange();
$mysqli = $con->connect();

extract($_POST);

$idCliente = preg_replace("/[^0-9]/","",$search);
$idCliente = (int) $idCliente;
$carregador = (isset($carregador) ? $carregador : '');
$caboDados = (isset($caboDados) ? $caboDados : '');
$statusInicial = 'Aguardando Início do Serviço';
$codServico = uniqid();
$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,marcaModelo,serie,placaMae,processador,memoria,hdSsd,fonte,placaVideo,leitorDvd,card,outros,dataEntrada,descDefeito,carregador,caboDados,cartucho,statusServico) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?,?,?,?)";
if(!$sql = $mysqli->prepare($query)) die($mysqli->error);

// montagem das strings
$placaMae = $placaMaeMarca. '+' . $placaMaeSn;
$processador = $processadorMarca. '+' . $processadorfreq. ' Ghz+' . $processadorBarr;
$memoriaA = $memoriaMarcaA. '+' .$memoriaGbA. '+' .$memoriaSnA;
$memoriaB = $memoriaMarcaB. '+' .$memoriaGbB. '+' .$memoriaSnB;
$memoria = $memoriaA.'/'.$memoriaB;
$hdSSd = $hdMarca. '+'. $hdGb. ' GB+' . $hdSn;
$fonte = $fonteMarca. '+' . $fonteWatts. '+' .$fonteSn;
$placaVideo =  $placaVideoMarca. '+' .$placaVideoGb. '+' .$placaVideoSn;
$leitorDvd = $leitorDvdMarca. '+' .$leitorDvdSn;
$leitorCartão = $leitorCartaoMarca . '+' .$leitorCartaoSn;
$cartuchoA = $cartuchoMarcaA. '+' .$cartuchoCorA. '+' .$cartuchoSnA;
$cartuchoB = $cartuchoMarcaB. '+' .$cartuchoCorB. '+' .$cartuchoSnB;
$cartucho = $cartuchoA.'/'.$cartuchoB;

$sql->bind_param('sisssssssssssssssss',$codServico,$idCliente,$equipamento,$marcaModelo,$serie,$placaMae,$processador,$memoria,$hdSSd,$fonte,$placaVideo,$leitorDvd,$leitorCartão,$outros,$infoPreliminar,$carregador,$caboDados,$cartucho,$statusInicial);

if(!$sql->execute()) die($mysqli->error);


$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
$mysqli = $con->connect();
$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,marcaModelo,serie,placaMae,processador,memoria,hdSsd,fonte,placaVideo,leitorDvd,card,outros,dataEntrada,descDefeito,carregador,caboDados,cartucho,statusServico) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),?,?,?,?,?)";
if(!$sql = $mysqli->prepare($query)) die($mysqli->error);
$sql->bind_param('sisssssssssssssssss',$codServico,$idCliente,$equipamento,$marcaModelo,$serie,$placaMae,$processador,$memoria,$hdSSd,$fonte,$placaVideo,$leitorDvd,$leitorCartão,$outros,$infoPreliminar,$carregador,$caboDados,$cartucho,$statusInicial);
if(!$sql->execute()) die($mysqli->error);

echo $codServico;
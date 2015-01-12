<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/MysqlChange.php');
$con = new MysqlChange();
$mysqli = $con->connect();

extract($_POST);
$idCliente = preg_replace("/[^0-9]/","",$idCliente);
$idCliente = (int) $idCliente;
$carregador = (isset($carregador) ? $carregador : '');
$caboDados = (isset($caboDados) ? $caboDados : '');
$statusInicial = 'Aguardando Início do Serviço';
$codServico = uniqid();
$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,marcaModelo,serie,placamae,memoria,hdSsd,fonte,placaVideo,leitorDvd,card,outros,dataEntrada,descDefeito,carregador,caboDados,cartucho,statusServico) VALUES(?,?,?,?,?,?,?,?,?,?,?,now(),?,?,?,?,?)";
if(!$mysqli->prepare($query)) die($mysqli->error);
$sql = $mysqli->prepare($query);
// montagem das strings
$placaMae = $placaMaeMarca. '-' . $placaMaeSn;
$memoria = $memoriaMarca. '-' .$memoriaGb. '-' .$memoriaSn;
$hdSSd = $hdMarca. '-'. $hdGb. '-' . $hdSn;















$sql->bind_param('sissssssssssssssss',$codServico,$idCliente,$nomeProduto,$marcaModelo,$numeroSerie,$placaMaeData,$memoriaData,$hdSSdData,$fonteData,$placaVideoData,$leitorDvdData,$leitorCardData,$outrosData,$descDefeito,$carregador,$caboDados,$cartuchoData,$statusInicial);

if(!$sql->execute()) die($mysqli->error);





//
//$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
//$mysqli = $con->connect();
//$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,serie,dataEntrada,descDefeito,carregador,caboDados,cartuchoPreto,cartuchoColorido,statusServico) VALUES(?,?,?,?,now(),?,?,?,?,?,?)";
//$sql = $mysqli->prepare($query);
//$sql->bind_param('sissssssss',$codServico,$search,$nomeProduto,$numeroSerie,$descDefeito,$carregador,$cabodados,$colorido,$pretobranco,$statusInicial);
//$sql->execute();

echo $codServico;
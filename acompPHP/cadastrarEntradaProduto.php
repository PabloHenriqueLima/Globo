<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/MysqlChange.php');
$con = new MysqlChange();
$mysqli = $con->connect();

extract($_POST);
$search = preg_replace("/[^0-9]/","",$search);
$search = (int) $search;
$carregador = (isset($carregador) ? $carregador : '');
$cabodados = (isset($cabodados) ? $cabodados : '');
$statusInicial = 'Aguardando Início do Serviço';
$codServico = uniqid();
$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,serie,dataEntrada,descDefeito,carregador,caboDados,cartuchoPreto,cartuchoColorido,statusServico) VALUES(?,?,?,?,now(),?,?,?,?,?,?)";
$sql = $mysqli->prepare($query);
$sql->bind_param('sissssssss',$codServico,$search,$nomeProduto,$numeroSerie,$descDefeito,$carregador,$cabodados,$colorido,$pretobranco,$statusInicial);
$sql->execute();

$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
$mysqli = $con->connect();

$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,serie,dataEntrada,descDefeito,carregador,caboDados,cartuchoPreto,cartuchoColorido,statusServico) VALUES(?,?,?,?,now(),?,?,?,?,?,?)";
$sql = $mysqli->prepare($query);
$sql->bind_param('sissssssss',$codServico,$search,$nomeProduto,$numeroSerie,$descDefeito,$carregador,$cabodados,$colorido,$pretobranco,$statusInicial);
$sql->execute();

echo $codServico;
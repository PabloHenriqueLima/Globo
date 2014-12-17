<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

extract($_POST);

$search = preg_replace("/[^0-9]/","",$search);
$search = (int) $search;
$carregador = (isset($carregador) ? $carregador : '');
$cabodados = (isset($cabodados) ? $cabodados : '');
$statusInicial = 'Aguardando Início do Serviço';
$codServico = uniqid();
$query = "INSERT INTO entrada (codigoServico,idCliente,equipamento,dataEntrada,descDefeito,carregador,caboDados,cartuchoPreto,cartuchoColorido,statusServico) VALUES(?,?,?,now(),?,?,?,?,?,?)";
$sql = $mysqli->prepare($query);
$sql->bind_param('sisssssss',$codServico,$search,$nomeProduto,$descDefeito,$carregador,$cabodados,$colorido,$pretobranco,$statusInicial);
$sql->execute();
echo $codServico;
//echo $search;
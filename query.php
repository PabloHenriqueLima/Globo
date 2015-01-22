<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/
require_once('configs/MysqlChange.php');
$con = new MysqlChange();

$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
$mysqli = $con->connect();


$q = "UPDATE entrada SET statusServico = 'Serviço em Andamento'";
if(!$sql = $mysqli->prepare($q)) echo $mysqli->error;
if(!$sql->execute()) echo $mysqli->error;
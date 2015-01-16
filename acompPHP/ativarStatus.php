<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/MysqlChange.php');
$con = new MysqlChange();
$mysqli = $con->connect();

$codigoServico = $_POST['codigoServico'];
$novoStatus = $_POST['valorNovoStatus'];

$query = "UPDATE entrada SET statusServico=? WHERE codigoServico=?";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('ss',$novoStatus,$codigoServico);
if (!$sql->execute())  echo $mysqli->error;

$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
$mysqli = $con->connect();

$query = "UPDATE entrada SET statusServico=? WHERE codigoServico=?";
if(!$sql = $mysqli->prepare($query))echo $mysqli->error;
$sql->bind_param('ss',$novoStatus,$codigoServico);
if (!$sql->execute())  echo $mysqli->error;

echo 'Status atualizado com sucesso.';
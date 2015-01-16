<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/MysqlChange.php');
$con = new MysqlChange();
$mysqli = $con->connect();

extract($_POST);

$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
$mysqli = $con->connect();

$query = "SELECT valor FROM orcamento WHERE codigoServico = ?";
if(!$sql = $mysqli->prepare($query) ) echo $mysqli->error;
$sql->bind_param('s',$codigoServico);
if(!$sql->execute()) echo "Erro";
$sql->store_result();
$sql->fetch();

if($sql->num_rows >0){

    $con->changeAll('localhost','root','','globodb');
    $mysqli = $con->connect();

    $query = "UPDATE orcamento SET referente = ?,valor = ? WHERE codigoServico = ?";
    if(!$sql = $mysqli->prepare($query) ) echo $mysqli->error;
    $sql->bind_param('sss',$referente,$valor,$codigoServico);
    if(!$sql->execute()) echo "Erro";

    $con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
    $mysqli = $con->connect();

    $query = "UPDATE orcamento SET referente = ?,valor = ? WHERE codigoServico = ?";
    if(!$sql = $mysqli->prepare($query) ) echo $mysqli->error;
    $sql->bind_param('sss',$referente,$valor,$codigoServico);
    if(!$sql->execute()) echo "Erro";

    echo "Orçamento já lançado, valor atualizado para o inserido";
}

$con->changeAll('localhost','root','','globodb');
$mysqli = $con->connect();

$query = "INSERT INTO orcamento (codigoServico,referente, valor) VALUES (?,?,?)";
if(!$sql = $mysqli->prepare($query) ) echo $mysqli->error;
$sql->bind_param('sss',$codigoServico,$referente,$valor);
if(!$sql->execute()) echo $mysqli->error;

$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
$mysqli = $con->connect();

$query = "INSERT INTO orcamento (codigoServico,referente, valor) VALUES (?,?,?)";
if(!$sql = $mysqli->prepare($query) ) echo $mysqli->error;
$sql->bind_param('sss',$codigoServico,$referente,$valor);
if($sql->execute()) echo "Status Inserido com sucesso";
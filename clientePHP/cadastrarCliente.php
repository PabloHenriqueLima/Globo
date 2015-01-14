<?php

/** Jesus Cristo - O Senhor e Salvador da Terra. **/
require_once('../configs/MysqlChange.php');
$con = new MysqlChange();
$mysqli = $con->connect();

extract($_POST);
$query = "INSERT INTO clientes (nomeCliente, cpfCliente, endCliente, bairroCliente, cepCliente, telefoneCliente, telelefoneBCliente, dataCadastroCliente) VALUES (?,?,?,?,?,?,?,now())";
if (!$sql_send = $mysqli->prepare($query)){
    echo $mysqli->error;
}
$sql_send->bind_param('sssssss',$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB);
$sql_send->execute();

//$con->changeAll('dbmy0053.whservidor.com','globoinfor1','GloboSec2415','globoinfor1');
//$mysqli = $con->connect();
//
//$query = "INSERT INTO clientes (nomeCliente, cpfCliente, endCliente, bairroCliente, cepCliente, telefoneCliente, telelefoneBCliente, dataCadastroCliente) VALUES (?,?,?,?,?,?,?,now())";
//if (!$sql_send = $mysqli->prepare($query)){
//    echo $mysqli->error;
//}
//$sql_send->bind_param('sssssss',$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB);
//$sql_send->execute();

echo "Cliente Cadastrado";


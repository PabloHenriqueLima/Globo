<?php

/** Jesus Cristo - O Senhor e Salvador da Terra. **/
require_once ('../configs/configs.php');
extract($_POST);
$query = "INSERT INTO clientes (nomeCliente, cpfCliente, endCliente, bairroCliente, cepCliente, telefoneCliente, telelefoneBCliente, dataCadastroCliente) VALUES (?,?,?,?,?,?,?,now())";
if (!$sql_send = $mysqli->prepare($query)){
    echo $mysqli->error;
}
$sql_send->bind_param('sssssss',$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB);
if ($sql_send->execute()){
    $sql_send->store_result();
   echo "Cliente Cadastrado";
}

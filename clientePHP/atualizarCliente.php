<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');
extract($_POST);


$query = "UPDATE clientes SET nomeCliente=?,cpfCliente=?,endCliente=?,bairroCliente=?,cepCliente=?,telefoneCliente=?,telelefoneBCliente=? WHERE id=?";
$idUpdate = $_POST['idCliente'];

$sql = $mysqli->prepare($query);

$sql->bind_param('sssssssi',$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB,$idCliente);
$sql->execute();
echo "Atualização realizada com sucesso";
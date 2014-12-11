<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

$busca = $_POST['busca'];
$query = "SELECT * FROM clientes WHERE nomeCliente LIKE CONCAT('%', ? , '%')";

if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}

$sql->bind_param('s',$busca);
$sql->execute();
$sql->store_result();
$sql->bind_result($id,$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB,$dataCadastro);
if($sql->num_rows >=1 AND $sql->num_rows < 10){
    while($sql->fetch()){
        echo "<option value=\"$id\">$nome</option>";
    }
}
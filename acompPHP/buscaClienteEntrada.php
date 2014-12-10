<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

$busca = $_POST['busca'];
$query = "SELECT * FROM clientes WHERE nome_cli LIKE CONCAT('%', ? , '%')";

if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}

$sql->bind_param('s',$busca);
$sql->execute();
$sql->store_result();
$sql->bind_result($id,$nome,$cpf,$end,$bairro,$cep,$tele1,$tele2);


if($sql->num_rows >= 2){
    $dados = ['nome'=>'Seja mais específico'];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}elseif(!$sql->num_rows >= 1){
    $dados = ['nome'=>'Cliente não encontrado'];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else {
    $sql->fetch();
    $dados = ['idCliente'=>$id,'nome'=>$nome,'cpf'=>$cpf];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}

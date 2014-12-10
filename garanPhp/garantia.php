<?php
require_once ('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];

$query =  "SELECT datainicio,periodo from garantia WHERE servicogarantia = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('i',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($dataInicio,$periodo);
$sql->fetch();
if($sql->num_rows >=1) {
    $query = "SELECT idCliente,equipamento,dataEntrada,descDefeito,finalizado FROM entrada WHERE codservico = ?";
    $sql->prepare($query);
    $sql->bind_param('i', $codigoServico);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($idCliente, $equipamento, $dataEntrada, $desDefeito, $finalizado);
    $sql->fetch();
    $query = "SELECT preco,descbaixa FROM saida WHERE codigoservico=?";
    $sql->prepare($query);
    $sql->bind_param('i',$codigoServico);
    $sql->execute();
    $sql->bind_result($preco,$descbaixa);
    $sql->fetch();



    $dados = ['dataInicio'=>$dataInicio,'periodo'=>$periodo,'idCliente'=>$idCliente,'equipamento'=>$equipamento,'dataEnt'=>$dataEntrada,'descDefeito'=>$desDefeito,'preco'=>$preco,'descBaixa'=>$descbaixa];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo 'Nenhum garantia gerada para esse serviço';
}

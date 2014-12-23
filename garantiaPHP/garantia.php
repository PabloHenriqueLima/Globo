<?php
require_once('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];
if(isset($_POST['controle'])){
    $controle = $_POST['controle'];
}

$query =  "SELECT inicio,periodo from garantia WHERE codigoServico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($dataInicio,$periodo);
$sql->fetch();
if($sql->num_rows >=1) {
    if($controle){
        echo true;
        exit();
    }
    $query = "SELECT idCliente,equipamento,descDefeito,preco,DescBaixa FROM entrada INNER JOIN saida on entrada.codigoServico = saida.codigoServico WHERE entrada.codigoServico = ?";
    $sql->prepare($query);
    $sql->bind_param('s', $codigoServico);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($idCliente, $equipamento, $desDefeito,$preco,$descBaixa);
    $sql->fetch();

    $quebrarInicio = explode(" ",$dataInicio);
    list($data,$horario) = $quebrarInicio;
    $quebrarData = explode("-",$data);
    list($ano,$mes,$dia) = $quebrarData;
    $dataFinal = date('d-m-Y',mktime(0,0,0,$mes,$dia + $periodo,$ano));
    $dataFinal = $dataFinal.' '.$horario;

    $dados = [
        'idCliente'=>$idCliente,
        'equipamento'=>$equipamento,
        'descDefeito'=>$desDefeito,
        'preco'=>$preco,
        'inicioGarantia'=>$dataInicio,
        'dataFinalGarantia'=>$dataFinal,
        'descBaixa'=>$descBaixa
    ];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo false;
}

<?php
require_once('../configs/localMysql.php');

extract($_POST);

$query =  "SELECT inicio,periodo from garantia WHERE codigoServico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($dataInicio,$periodo);
$sql->fetch();


    $quebrarInicio = explode(" ",$dataInicio);
    list($data,$horario) = $quebrarInicio;
    $quebrarData = explode("-",$data);
    list($ano,$mes,$dia) = $quebrarData;
    $dataFinal = date('d-m-Y',mktime(0,0,0,$mes,$dia + $periodo,$ano));
    $dataFinal = $dataFinal.' '.$horario;

    $dados = [
        'dataFinal'=>$dataFinal
    ];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;

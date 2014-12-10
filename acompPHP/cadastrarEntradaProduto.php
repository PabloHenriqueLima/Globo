<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

$expected = array('idClienteEntrada','nomeProduto','descDefeito','dataEntrada','colorido','pretobranco');
foreach($expected as $key){
    if(!empty($_POST[$key])){
        ${$key} = $_POST[$key];
    }
    else{
        ${$key}="";
    }
}
$chars = array("/");
$dataEntrada = str_replace($chars,"",$dataEntrada);

if(isset($_POST['carregador']))
{
    $carregador = $_POST['carregador'];
}else{
    $carregador = '';
}
if(isset($_POST['cabodados'])):
    $cabodados = $_POST['cabodados'];
else:
    $cabodados = '';
endif;
if(isset($_POST['cabodados'])):$cabodados = $_POST['cabodados'];else:$cabodados = '';endif;

$statusInicial = 'Aguardando Início do Serviço';
$codservico = time();
$query = "INSERT INTO entrada (idCliente,produto,dataEntrada,descDefeito,carregador,dados,codservico,statusServico,cartpreto,cartcor) VALUES(?,?,?,?,?,?,?,?,?,?)";
$sql = $mysqli->prepare($query);
$sql->bind_param('isisssisss',$idClienteEntrada,$nomeProduto,$dataEntrada,$descDefeito,$carregador,$cabodados,$codservico,$statusInicial,$colorido,$pretobranco);
$sql->execute();
echo 'Sucesso. Código do serviço: ' .$codservico;
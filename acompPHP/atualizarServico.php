<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once ('../configs/configs.php');

$chars = array("/","-","(",")");
$equipamento = $_POST['eqpservico'];
$dataEntrada = $_POST['dtentrada'];
$descDefeito = $_POST['descDefeitoServico'];
$carregador = $_POST['ccarregador'];
$dados = $_POST['ccdados'];
$catpreto = $_POST['ccartpreto'];
$catcor =  $_POST['ccartcor'];
$codigoServico = $_POST['codigoServico'];


$query = "UPDATE entrada SET equipamento=?,dataEntrada=?,descDefeito=?,carregador=?,dados=?,cartpreto=?,cartcor=? WHERE codservico=?";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('sisssssi',$equipamento,$dataEntrada,$descDefeito,$carregador,$dados,$catpreto,$catcor,$codigoServico);
$sql->execute();
echo "Atualização realizada com sucesso";
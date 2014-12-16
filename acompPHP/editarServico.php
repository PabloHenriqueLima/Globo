<?php
require_once ('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];


$query = "SELECT equipamento,dataEntrada,descDefeito,carregador,caboDados,cartuchoPreto,cartuchoColorido,finalizado FROM entrada WHERE codigoServico=?";
$sql = $mysqli->prepare($query);
$sql->bind_param('s',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($equipamento,$dataEntrada,$descDefeito,$carregador,$caboDados,$cartuchoPreto,$cartuchoColorido,$finalizado);
$sql->fetch();
if($sql->num_rows >= 1){
    $dados = ['equipamento'=>$equipamento,'dataEntrada'=>$dataEntrada,'descDefeito'=>$descDefeito,'carregador'=>$carregador,'caboDados'=>$caboDados,'cartuchoPreto'=>$cartuchoPreto,'cartuchoColorido'=>$cartuchoColorido];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo false;
}

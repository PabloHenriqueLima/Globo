<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');

extract($_POST);


$query = "UPDATE entrada SET equipamento=?,descDefeito=?,carregador=?,caboDados=?,cartuchoPreto=?,cartuchoColorido=? WHERE codigoServico=?";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('sssssss',$equipamentoS,$descDefeitoS,$carregadorS,$caboDadosS,$cartuchoPretoS,$cartuchoColoridoS,$codigoServico);
$sql->execute();
echo "Atualização realizada com sucesso.";
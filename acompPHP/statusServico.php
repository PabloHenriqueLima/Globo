<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');

$codigoServico = $_POST['codigoServico'];

$query = "SELECT statusServico,equipamento from entrada WHERE codigoServico = ?";
if($sql = $mysqli->prepare($query)){
    echo $mysqli->error;
}
$sql->bind_param('s',$codigoServico);
if($sql->execute()){
    echo $mysqli->error;
}
$sql->store_result();
$sql->bind_result($statusAtualServico,$equipamento);
$sql->fetch();
if($sql->num_rows >= 1){
    $dados = ['statusAtual'=>$statusAtualServico,'equipamento'=>$equipamento];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo false;
}

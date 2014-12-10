<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once ('../configs/configs.php');

$codigoServico = $_POST['codstatus'];

$query = "SELECT statusServico,produto from entrada WHERE codservico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('i',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($statusAtualServico,$equipamento);
$sql->fetch();
if($sql->num_rows >= 1){
    $dados = ['statusAtual'=>$statusAtualServico,'equipamento'=>$equipamento];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo "false";
}

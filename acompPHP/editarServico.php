<?php
require_once ('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];


$query = "SELECT equipamento,dataEntrada,descDefeito,carregador,dados,cartpreto,cartcor FROM entrada WHERE codservico=?";
$sql = $mysqli->prepare($query);
$sql->bind_param('i',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($equipamento,$dataEntrada,$descDefeito,$carregador,$dados,$cartpreto,$cartcor);
$sql->fetch();
if($sql->num_rows >= 1){
    $dados = ['eqpservico'=>$equipamento,'dtentrada'=>$dataEntrada,'descDefeitoServico'=>$descDefeito,'ccarregador'=>$carregador,'ccdados'=>$dados,'ccartpreto'=>$cartpreto,'ccartcor'=>$cartcor];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo "false";
}

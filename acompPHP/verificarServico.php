<?php
require_once ('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];


$query = "SELECT codservico,equipamento,nome_cli FROM entrada Ent INNER JOIN clientes Cli ON Ent.idCliente = Cli.id WHERE codservico = ?";
$sql = $mysqli->prepare($query);
$sql->bind_param('i',$codigoServico);
$sql->execute();
$sql->store_result();
$sql->bind_result($codServico,$produto,$nomeCliente);
$sql->fetch();
if($sql->num_rows >= 1){
    $dados = ['CodServico'=>$codigoServico,'produto'=>$produto,'cliente'=>$nomeCliente];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
}else{
    echo "false";
}

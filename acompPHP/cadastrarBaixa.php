<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

$expected = array('codigoservico','valorServico','dataSaida','descServico','gerargarantia','garantia');
foreach($expected as $key){
    if(!empty($_POST[$key])){
        ${$key} = $_POST[$key];
    }
    else{
        ${$key}=" ";
    }
}
$chars = array("/");
$dataSaida = str_replace($chars,"",$dataSaida);
$valorServico = str_replace($chars,"",$valorServico);
if($gerargarantia == "x"):
    $query = "INSERT INTO garantia (servicogarantia, datainicio, periodo) VALUES (?,?,?)";
    if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
    $sql->bind_param('iii',$codigoservico,$dataSaida,$garantia);
    if($sql->execute()){}else{echo $mysqli->error;}
else:
endif;

$query = "INSERT INTO saida (codigoservico, preco, databaixa, descbaixa, garantia) VALUES (?,?,?,?,?)";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('iiiss',$codigoservico,$valorServico,$dataSaida,$descServico,$gerargarantia);
if ($sql->execute()):
    else:
        echo $mysqli->error;
        endif;
$query = "UPDATE entrada SET finalizado = ? WHERE codservico=?";
$sql->prepare($query);
$x = 'x';
$sql->bind_param('si',$x,$codigoservico);
$sql->execute();
echo 'Sucesso.';

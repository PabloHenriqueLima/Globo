<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

$codServico = $_POST['codStatus'];
$novoStatus = $_POST['alterStatus'];

$query = "UPDATE entrada SET statusServico=? WHERE codservico=?";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('si',$novoStatus,$codServico);
if ($sql->execute()):
else:
    echo $mysqli->error;
endif;
echo 'Sucesso.';

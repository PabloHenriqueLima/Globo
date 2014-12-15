<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/configs.php');

$codigoServico = $_POST['codigoServico'];
$novoStatus = $_POST['valorNovoStatus'];

$query = "UPDATE entrada SET statusServico=? WHERE codigoServico=?";
if($sql = $mysqli->prepare($query)){}else{echo $mysqli->error;}
$sql->bind_param('ss',$novoStatus,$codigoServico);
if ($sql->execute()):
    echo 'Status atualizado com sucesso.';
else:
    echo $mysqli->error;
endif;

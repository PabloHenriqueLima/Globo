<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');


$idCliente = $_POST['idCliente'];

$query = "SELECT * FROM clientes WHERE id =?";

if($sql = $mysqli->prepare($query)):
    $sql->bind_param('i',$idCliente);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($id,$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB,$dataCadastro);
    $sql->fetch();
    $dados = ['id'=>$id,"nome"=>$nome,"cpf"=>$cpf,"endereco"=>$endereco,"bairro"=>$bairro,"cep"=>$cep,"telefone"=>$telefone,"telefoneB"=>$telefoneB];
    $dadosJSON = json_encode($dados,JSON_UNESCAPED_UNICODE);
    echo $dadosJSON;
else:
    echo "Deu erro chapa !";
endif;
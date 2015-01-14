<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

require_once('../configs/localMysql.php');

$busca = $_POST['buscarCliente'];
$query = "SELECT * FROM clientes WHERE nomeCliente LIKE CONCAT('%', ? , '%')";

if($sql = $mysqli->prepare($query)){
}else{
    echo $mysqli->error;
}
$sql->bind_param('s',$busca);
$sql->execute();
$sql->store_result();
$sql->bind_result($id,$nome,$cpf,$endereco,$bairro,$cep,$telefone,$telefoneB,$dataCadastro);

if($sql->num_rows >= 5){
    echo "Seja mais específico";
}elseif(!$sql->num_rows >= 1){
    echo 'Cliente não encontrado, procure por outro nome !!!';
}else {
    $i=1;
    while ($sql->fetch()) {
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$nome.'</td>';
        echo '<td>'.$cpf.'</td>';
        echo '<td>'."<button type=\"button\" id=\"btn_visualizar\" idCliente=\"$id\" class=\"btn btn-primary\"> Visualizar </button> ";
        echo "<button type=\"button\" id=\"btn_editar\" idCliente=\"$id\"  class=\"btn btn-warning\"> Editar </button> ";
        echo "<button type=\"button\" id=\"btn_deletar\" idCliente=\"$id\"  class=\"btn btn-danger\"> Excluir </button>".'</td>';
        echo '</tr>';
        $i++;

    }
}


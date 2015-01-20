<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/
require_once('configs/localMysql.php');

$q = "UPDATE entrada SET finalizado = ' '";
$sql = $mysqli->prepare($q);
$sql->execute();
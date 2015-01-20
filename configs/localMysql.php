<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/

$ip_mysql ="127.0.0.1";
$login_mysql ="root";
$senha_mysql ="Goku2415";
$database_mysql="globodb";
$error_msg ="Não foi possível conectar ao banco de dados: ";



$mysqli = new mysqli($ip_mysql,$login_mysql,$senha_mysql,$database_mysql);
$mysqli->set_charset("utf8");
if (mysqli_connect_errno()) {
    die($error_msg . mysqli_connect_error());
}

<?php
/** Jesus Cristo - O Senhor e Salvador da Terra. **/
class MysqlChange {
    var $ip_mysql ="127.0.0.1";
    var $login_mysql ="root";
    var $senha_mysql ="";
    var $database_mysql="globodb";
    var $error_msg ="Não foi possível conectar ao banco de dados: ";


    function connect(){
        $mysqli = new mysqli($this->ip_mysql,$this->login_mysql,$this->senha_mysql,$this->database_mysql);
        $mysqli->set_charset("utf8");
        if (mysqli_connect_errno()) {
            die($this->error_msg . mysqli_connect_error());
        }
        return $mysqli;
    }
    function changeAll($ip,$login,$senha,$database){
        $this->ip_mysql = $ip;
        $this->login_mysql = $login;
        $this->senha_mysql = $senha;
        $this->database_mysql = $database;

    }
    function changeDB($database){
        $this->database_mysql = $database;
    }
    function changeServer($ipServer){
        $this->ip_mysql = $ipServer;
    }
    function changeLogin ($login){
        $this->login_mysql = $login;
    }
    function changePass($senha){
        $this->senha_mysql = $senha;
    }
}
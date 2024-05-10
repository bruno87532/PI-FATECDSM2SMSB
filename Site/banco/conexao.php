<?php
function conectaBanco(){
    $hostname = "localhost";
    $namebd = "clinica";
    $user = "root";
    $pass = "";
    try{
        $conexao = new PDO("mysql:host=$hostname;dbname=$namebd;",$user,$pass);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }catch(PDOException $e){
        return NULL;
    }
}
?>
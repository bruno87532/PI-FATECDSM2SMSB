<?php
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/paciente.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["nome"] == NULL){
        exit();
    }
    if($_POST["cpf"] == NULL){
        exit();
    }
    if($_POST["email"] == NULL){
        exit();
    }
    if($_POST["telefone"] == NULL){
        exit();
    }
    if($_POST["data_nascimento"] == NULL){
        exit();
    }
    if($_POST["cep"] == NULL){
        exit();
    }
    if($_POST["estado"] == NULL){
        exit();
    }
    if($_POST["cidade"] == NULL){
        exit();
    }
    if($_POST["bairro"] == NULL){
        exit();
    }
    if($_POST["rua"] == NULL){
        exit();
    }
    if($_POST["numerocasa"] == NULL){
        exit();
    }
    if($_POST["sexo"] == NULL){
        exit();
    }
    if($_POST["idoso"] == NULL && $_POST["pcd"] == NULL){
        exit();
    }
    $paciente = new Paciente($_POST["nome"], $_POST["cpf"], $_POST["data_nascimento"], $_POST["telefone"], $_POST["email"], $_POST["pcd"], $_POST["idoso"], $_POST["deficiencia"], $_POST["sexo"]);
}else{
    exit();
}
?>
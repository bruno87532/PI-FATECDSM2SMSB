<?php
require_once("funcoes.php");
require_once("../classes/validadora.php");
require_once("retorno.php");
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/paciente.php");
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/endereco.php");
$validacao_existe = new valida_cadastro();
$validacao_existe->destroi_sessao();
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
    if($_POST["numero_casa"] == NULL){
        exit();
    }
    if($_POST["sexo"] == NULL){
        exit();
    } 
    if(isset($_POST["pcd"])){
        if($_POST["deficiencia"] == ""){
            exit();
        }
    }
    $boolTesteNome = validaNome($_POST["nome"]);
    if(!($boolTesteNome)){
        $_SESSION["nome"] = true;
        header("Location: ../Cadastre-se.php");
        exit();
    }
    $boolTesteCpf = validaCpf($_POST["cpf"]);
    if(!($boolTesteCpf)){
        $_SESSION["cpf"] = true;
        header("Location: ../Cadastre-se.php");
        exit();
    }
    $boolTesteTelefone = validaTelefone($_POST["telefone"]);
    if(!($boolTesteTelefone)){
        $_SESSION["telefone"] = true;
        header("Location: ../Cadastre-se.php");
        exit();
    }
    $boolTesteNascimento = validaNascimento($_POST["nascimento"]);
    if(!($boolTesteNascimento)){
        $_SESSION["nascimento"] = true;
        header("Location: ../Cadastre-se.php");
    }
    $paciente = new Paciente();
    $paciente->setNome($_POST["nome"]);
    $paciente->setCpf($_POST["cpf"]);
    $paciente->setEmail($_POST["email"]);
    $paciente->setTelefone($_POST["telefone"]);
    $paciente->setNascimento($_POST["data_nascimento"]);
    $paciente->setGenero($_POST["sexo"]);
    if(isset($_POST["idoso"])){
        $paciente->setIdoso(1);
    }
    if(isset($_POST["pcd"])){
        $paciente->setPCD(1);
        $paciente->setNecessidade($necessidade);
    }
    $endereco = new Endereco();
    $endereco->setCep($_POST["cep"]);
    $endereco->setEstado($_POST["estado"]);
    $endereco->setCidade($_POST["cidade"]);
    $endereco->setBairro($_POST["bairro"]);
    $endereco->setRua($_POST["rua"]);
    $endereco->setNumero($_POST["numero_casa"]);
    if($_POST["complemento"] != ""){
        $endereco->complemento = $_POST["complemento"];
    } 
}else{
    exit();
}

?>
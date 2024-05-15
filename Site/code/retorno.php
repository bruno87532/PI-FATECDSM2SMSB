<?php
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/paciente.php");
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/endereco.php");
require_once("confirmaCadastro.php");
$retornoPaciente = new Paciente();
if(isset($_POST["pcd"]) && isset($_POST["idoso"])){
    $retornoPaciente->preencheRetorno($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["data_nascimento"], $_POST["sexo"], $_POST["pcd"], $_POST["deficiencia"], $_POST["idoso"]);
}else if(isset($_POST["pcd"])){
    $retornoPaciente->preencheRetorno($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["data_nascimento"], $_POST["sexo"], $_POST["pcd"], $_POST["deficiencia"]);
}else{
    $retornoPaciente->preencheRetorno($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["telefone"], $_POST["data_nascimento"], $_POST["sexo"], $_POST["idoso"]);
}
$retornoEndereco = new Endereco();
if(isset($_POST["complemento"])){
    $retornoEndereco->preencheRetorno($_POST["cep"], $_POST["estado"], $_POST["cidade"], $_POST["bairro"], $_POST["rua"], $_POST["numero_casa"], $_POST["complemento"]);
}else{
    $retornoEndereco->preencheRetorno($_POST["cep"], $_POST["estado"], $_POST["cidade"], $_POST["bairro"], $_POST["rua"], $_POST["numero_casa"]);
}
?>
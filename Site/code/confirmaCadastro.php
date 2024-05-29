<?php
require_once __DIR__."/../class/Patient.php";
require_once __DIR__."/../class/PatientRepository.php";
require_once __DIR__."/../class/Address.php";
require_once __DIR__."/../class/Functions.php";
require_once __DIR__."/../class/Validator.php";
$valida_campo = new Functions();
$destroi_sessao = new Validator();
$destroi_sessao->destroi_sessao();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $post = ["nome", "cpf", "email", "senha", "telefone", "data_nascimento", "cep", "estado", "cidade", "bairro", "rua", "numero_casa", "sexo"];
    foreach($post as $campo){
        if($_POST[$campo] == ""){
            exit();
        }
    }
    if($_POST["idoso"] == 0 && $_POST["pcd"] == 0){
        $_SESSION["pid"] = true;
        header("Location: ../Cadastre-se.php");
        exit();
    }
    if($_POST["pcd"] == 1 && $_POST["deficiencia"] == ""){
        $_SESSION["deficiencia"] = true;
        header("Location: ../Cadastre-se.php");
        exit();
    }
    $parametros_paciente = [$_POST["nome"], $_POST["cpf"], $_POST["data_nascimento"], $_POST["telefone"], $_POST["email"], $_POST["senha"], $_POST["sexo"]];
    if(isset($_POST["pcd"], $_POST["deficiencia"], $_POST["idoso"]) && $_POST["pcd"] == 1 && $_POST["deficiencia"] != "" && $_POST["idoso"] == 1){
        $todos_parametros = array_merge($parametros_paciente, [$_POST["pcd"], $_POST["deficiencia"], $_POST["idoso"]]);
        call_user_func_array(["Patient", "novoPaciente"], $todos_parametros);
    }else if(isset($_POST["pcd"], $_POST["deficiencia"]) && $_POST["pcd"] == 1 && $_POST["deficiencia"] != ""){
        $todos_parametros = array_merge($parametros_paciente, [$_POST["pcd"], $_POST["deficiencia"]]);
        call_user_func_array(["Patient", "novoPaciente"], $todos_parametros);
    }else if(isset($_POST["idoso"]) && $_POST["idoso"] == 1){
        $todos_parametros = array_merge($parametros_paciente, [$_POST["idoso"]]);
        call_user_func_array(["Patient", "novoPaciente"], $todos_parametros);
    }
    $parametros_endereco = [$_POST["cep"], $_POST["estado"], $_POST["cidade"], $_POST["bairro"], $_POST["rua"], $_POST["numero_casa"]];
    if(isset($_POST["complemento"]) && $_POST["complemento"] != ""){
        $todos_parametros = array_merge($parametros_endereco, [$_POST["complemento"]]);
        call_user_func_array(["Address", "novoEndereco"], $todos_parametros);
    }else{
        call_user_func_array(["Address", "novoEndereco"], $parametros_endereco);
    }
}else{
    exit();
}
$campos_validado = $valida_campo->validaCampos($_POST["nome"], $_POST["cpf"], $_POST["senha"], $_POST["telefone"], $_POST["data_nascimento"]);
if(!$campos_validado){
    header("Location: ../Cadastre-se.php");
    exit();
}

$insere_paciente = new PatientRepository();
$id = $insere_paciente->createEndereco($_SESSION["endereco"]);
$insere_paciente->createPaciente($_SESSION["paciente"], $id);
unset($_SESSION["paciente"]);
unset($_SESSION["endereco"]);
?>
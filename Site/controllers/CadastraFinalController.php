<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../class/Address.php";
require_once __DIR__."/../class/PatientRepository.php";
require_once __DIR__."/../class/Functions.php";

if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}

class CadastraFinalController extends RenderView {

    public function index() {
        $this->loadView( 
            'login', []
        );
        
    }
    public function insert(){
        $post = ["cep", "estado", "cidade", "bairro", "rua", "numero_casa"];
        foreach($post as $campo){
            if($_POST[$campo] == ""){
                header('Location: proximo');
                exit();
            }
        }

        $ParamAddress = [$_POST['cep'], $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero_casa']];
        if(isset($_POST['complemento']) && $_POST['complemento'] != ''){
            $allParametersAddress = array_merge($ParamAddress, [$_POST['complemento']]);
            call_user_func_array(['Address', 'novoEndereco'], $allParametersAddress);
        }else{
            call_user_func_array(['Address', 'novoEndereco'], $ParamAddress);
        }

        $ValidatorCadFinal = new Functions;
        $validaCEP = $ValidatorCadFinal->validaCEP($_POST['cep']);
        if(!$validaCEP){
            $_SESSION['cep'] = true;
            header('Location: proximo');
            exit();
        }

        $insertPatient = new PatientRepository();
        $id = $insertPatient->createEndereco($_SESSION["address"]);
        $insertPatient->createPaciente($_SESSION["patient"], $id);
        unset($_SESSION["patient"]);
        unset($_SESSION["address"]);
        $this->index();
    }
}
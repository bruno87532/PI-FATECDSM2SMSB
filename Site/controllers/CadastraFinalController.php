<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

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
        $cepPatient = new FunctionsPatient();
        $cepPatient->verifyInsert($_POST['cep'], $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero_casa']);

        $ValidatorCadFinal = new FunctionsPatient();
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
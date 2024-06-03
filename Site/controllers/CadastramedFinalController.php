<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}

class CadastramedFinalController extends RenderView {
    public function index() {
        $verifiyLoginEmployee = new Login();
        if(!$verifiyLoginEmployee->verifyLoginEmployee()){
            header('Location: ../Site');
            exit();
        }
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $this->loadView( 
            'home', []
        );
        
    }
    public function insert(){
        $verifiyLoginEmployee = new Login();
        if(!$verifiyLoginEmployee->verifyLoginEmployee()){
            header('Location: ../Site');
            exit();
        }
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $cepPatient = new FunctionsPatient();
        $cepPatient->verifyInsert($_POST['cep'], $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero_casa']);

        $ValidatorCadFinal = new FunctionsPatient();
        $validaCEP = $ValidatorCadFinal->validaCEP($_POST['cep']);
        if(!$validaCEP){
            $_SESSION['cep'] = true;
            header('Location: proximo');
            exit();
        }

        $insertDoctor = new DoctorRepository();
        $id = $insertDoctor->createEndereco($_SESSION["address"]);
        $insertDoctor->createDoctor($_SESSION["doctor"], $id, $_SESSION['login_id']);
        unset($_SESSION["doctor"]);
        unset($_SESSION["address"]);
        $this->index();
    }
}
<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class ProximoMedController extends RenderView {
    public function index() {
        $this->loadView(
            'proximo',
            []
        );
    }
    public function validator(){
        $ValidatorProx = new ValidatorMed();
        $ValidatorProx->destroi_sessao();

        $post = ['nomem', 'cpfm', 'emailm', 'senham', 'telefonem', 'data_nascimentom', 'sexom', 'crm', 'especialidade', 'disponibilidadeInicio', 'disponibilidadeFim'];
        foreach($post as $campo){
            if(!isset($_POST[$campo])){
                header('Location: ../cadastromed');
                exit();
            }
        }
        $paramDoctor = [$_POST["cpfm"], $_POST["nomem"], $_POST["data_nascimentom"], $_POST["emailm"], $_POST['senham'], $_POST["telefonem"], $_POST["crm"], $_POST["disponibilidadeInicio"], $_POST['disponibilidadeFim'], $_POST['sexom'], $_POST['especialidade']];

        call_user_func_array(['Doctor', 'novoDoctor'], $paramDoctor);

        $FunctionsValidMed = new FunctionsMed();
        $returnOrNotMed = $FunctionsValidMed->validaCampos($_POST['nomem'], $_POST['cpfm'], $_POST['senham'], $_POST['telefonem'], $_POST['data_nascimentom'], $_POST['emailm'], $_POST['crm']);
        if(!$returnOrNotMed){
            header('Location: ../cadastromed');
            exit();
        }
        
        header('Location: ../proximo');
    }
}
<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class CadastromedController extends RenderView {

    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $verifyLogin = new Login();
        if(!($verifyLogin->verifyLoginEmployee())){
            header('Location: ../Site');
            exit();
        }
        $this->loadView( 
            'cadastroMedico', []
        );
        
    }
}
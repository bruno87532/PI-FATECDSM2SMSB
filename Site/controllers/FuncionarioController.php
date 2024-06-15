<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class FuncionarioController extends RenderView {

    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $verifyLogin = new Login();
        if(!($verifyLogin->verifyLoginEmployee() || $verifyLogin->verifyLoginDoctor())){
            header('Location: ../Site');
            exit();
        }
        $this->loadView( 
            'funcionario', []
        );
        
    }
}
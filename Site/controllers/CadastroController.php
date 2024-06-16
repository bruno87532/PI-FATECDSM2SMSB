<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";


class CadastroController extends RenderView {

    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $verifyLogin = new Login();
        if($verifyLogin->verifyLoginDoctor() || $verifyLogin->verifyLoginEmployee()){
            header('Location: funcionario');
        }else if($verifyLogin->verifyLogin()){
            header('Location: ../Site');
            exit();
        }
        $this->loadView( 
            'cadastro', []
        );
        
    }
}
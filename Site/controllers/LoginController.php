<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../models/conexao.php";
require_once __DIR__."/../class/PatientRepository.php";

class LoginController extends RenderView {
    public function index() {
        $this->loadView( 
            'login', []
        );
    }

    public function autenthication() {
        if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == true){
            unset($_SESSION['login_error']);
        }
        $loginUser = new PatientRepository;
        $loginUser->SelecionaPaciente($_POST['email'], $_POST['password']);
        
    }
}
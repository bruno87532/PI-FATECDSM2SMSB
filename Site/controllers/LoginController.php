<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class LoginController extends RenderView {
    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        if(isset($_SESSION['login'])){
            $loginVerify = new Login();
            if($loginVerify->verifyLoginDoctor() || $loginVerify->verifyLoginEmployee()){
                header('Location: funcionario');
                exit();
            }
            header('Location: ../Site');
            exit();
        }
        $this->loadView( 
            'login', []
        );
    }

    public function autenthication() {
        if(isset($_SESSION['login'])){
            header('Location: ../');
        }
        if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == true){
            unset($_SESSION['login_error']);
        }
        $loginEmployee = new EmployeeRepository();
        if($loginEmployee->SelecionaFuncionario($_POST['email'], $_POST['password'])){
            header('Location: ../funcionario');
            exit();
        }
        $loginDoctor = new DoctorRepository();
        if($loginDoctor->SelecionaMedico($_POST['email'], $_POST['password'])){
            header('Location: ../funcionario');
            exit();
        }
        $loginUser = new PatientRepository();
        if($loginUser->SelecionaPaciente($_POST['email'], $_POST['password'])){
            header('Location: ../');
            exit();
        }
        header('Location: ../login');
    }
}
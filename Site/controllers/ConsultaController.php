<?php
ob_start();
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class ConsultaController extends RenderView{
    public function index() {
        $loginConsulta = new Login();
        if(!$loginConsulta->verifyLogin()){
            header('Location: ../Site');
            exit();
        }
        $this->loadView(
            'agendarConsulta', []
        );
    }
}
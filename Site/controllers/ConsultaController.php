<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../class/Login.php";

class ConsultaController extends RenderView{
    public function index() {
        $loginConsulta = new Login;
        if(!$loginConsulta->verifyLogin()){
            header('Location: ../Site');
            exit();
        }
        $this->loadView(
            'agendarConsulta', []
        );
    }
}
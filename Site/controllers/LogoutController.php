<?php
ob_start();
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class LogoutController extends RenderView {
    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            header('Location: ../Site');
            exit();
        }
        $logout = new Login();
        $logout->logout();
        $this->loadView( 
            'home', []
        );
    }
}
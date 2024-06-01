<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../class/Login.php";
class LogoutController extends RenderView {
    public function index() {
        $logout = new Login;
        $logout->logout();
        $this->loadView( 
            'home', []
        );
    }
}
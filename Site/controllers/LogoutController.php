<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../class/Validator.php";
$ValidatorLogout = new Validator;
$ValidatorLogout->destroi_sessao();
class LogoutController extends RenderView {
    public function index() {
        $this->loadView( 
            'home', []
        );
    }
}
<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class HomeController extends RenderView {

    public function index($match) {
        $clearSessions = new Validator();
        $clearSessions->destroi_sessao();
        $this->loadView( 
            'Home', []
        );
      
      
        
    }

}
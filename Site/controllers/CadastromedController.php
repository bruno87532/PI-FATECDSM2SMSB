<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class CadastromedController extends RenderView {

    public function index() {
        $this->loadView( 
            'cadastroMedico', []
        );
        
    }
}
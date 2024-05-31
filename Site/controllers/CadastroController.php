<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";

class CadastroController extends RenderView {

    public function index() {
        $this->loadView( 
            'cadastro', []
        );
        
    }
}
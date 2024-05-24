<?php

require_once __DIR__."/../utils/RenderView.php";

class LoginController extends RenderView {

    public function index() {
        $this->loadView( 
            'login', []
        );
    }

    public function autenthication() {
        echo "valida o que precisa e manda pra pagina que quer!!";
    }
}
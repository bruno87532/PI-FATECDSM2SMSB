<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class FuncionarioController extends RenderView {

    public function index($match) {
        $this->loadView( 
            'funcionario', []
        );
      
      
        
    }

}
?>

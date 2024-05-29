<?php

require_once __DIR__."/../utils/RenderView.php";

class ProximoController extends RenderView{
    public function index(){
        $this->loadView(
            'proximo',
            []
        );
    }
    public function validator(){
    
        if(!(isset($_POST['pcd']) || isset($_POST['idoso']))){
            $_SESSION["deficiencia"] = true;
            header('Location: ../cadastro');
            exit();
        }    

        // $this->index();
        header('Location: ../proximo');
        
    }
}

?>
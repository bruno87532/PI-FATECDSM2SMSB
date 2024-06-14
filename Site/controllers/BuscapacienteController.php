<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";


class BuscapacienteController extends RenderView {

    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $this->loadView( 
        );
    }
    public function buscaPaciente(){
        $nome = $_POST['nomePaciente'];

        $sql = 'SELECT * FROM consultas WHERE nome LIKE :nome';
        // $stmt->execute();
    }
}
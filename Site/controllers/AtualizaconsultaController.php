<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";


class AtualizaconsultaController extends RenderView {

    public function index() {
        $selecionaConsulta = new AppointmentRepository;
        $link = $_SERVER['REQUEST_URI'];
        $partelink = explode('/', $link);
        $id = end($partelink);
        $sql = 'SELECT id, statusC, horarioInicio, horarioFim, diagnostico, tratamento, valor, dataC FROM consultas WHERE id = '.$id;
        $consultas = $selecionaConsulta->selecionaTudo($sql);
        $this->loadView(
            'editaform', ['consultas' => $consultas]
        );
    }
    public function atualizapaciente() {
        echo 'test';
    }
}
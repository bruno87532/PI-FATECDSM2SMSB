<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";


class EditaconsultaController extends RenderView {

    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $selecionaConsulta = new AppointmentRepository;
        $consultas = $selecionaConsulta->selecionaTudo('SELECT p.nome AS pnome, m.nome AS mnome, c.dataC, c.statusC, c.diagnostico, c.tratamento, c.valor, c.horarioInicio, c.horarioFim, c.id FROM consultas c INNER JOIN medicos m ON m.id = c.id_medico INNER JOIN pacientes p ON p.id = c.id_paciente;');
        $this->loadView(
            'editarConsulta', ['consultas' => $consultas]
        );
    }
    public function buscapaciente(){
        $array_campos = ['p.nome AS pnome', 'm.nome AS mnome', 'c.dataC', 'c.statusC', 'c.diagnostico', 'c.tratamento', 'c.valor', 'c.horarioInicio', 'c.horarioFim', 'c.id'];
        $tabelas = 'consultas c INNER JOIN medicos m ON m.id = c.id_medico INNER JOIN pacientes p ON p.id = c.id_paciente';
        $campo_valor = 'p.nome';
        $valor = $_POST['busca'];
        $selecionaConsulta = new AppointmentRepository;
        $consultas = $selecionaConsulta->selecionaCampos($array_campos, $tabelas, $campo_valor, $valor);
        $this->loadView(
            'editarConsulta', ['consultas' => $consultas]
        );
    }
    public function editapaciente(){
        $selecionaConsulta = new AppointmentRepository;
        $link = $_SERVER['REQUEST_URI'];
        $partelink = explode('/', $link);
        $id = end($partelink);
        $sql = 'SELECT statusC, horarioInicio, horarioFim, diagnostico, tratamento, valor, dataC FROM consultas WHERE id = '.$id;
        $consultas = $selecionaConsulta->selecionaTudo($sql);
        $this->loadView(
            'editaform', ['consultas' => $consultas]
        );
    }
}
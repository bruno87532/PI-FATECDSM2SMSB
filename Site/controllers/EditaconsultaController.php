<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";
function verificaLogin(){
    if(empty($_SERVER['HTTP_REFERER'])){
        $clearSessions = new Validator();
        $clearSessions->destroi_sessao();
    }
    $verifyLogin = new Login();
    if(!($verifyLogin->verifyLoginDoctor())){
        header('Location: ../Site');
        exit();
    }
}

class EditaconsultaController extends RenderView {

    public function index() {
        verificaLogin();
        $selecionaConsulta = new AppointmentRepository;
        $consultas = $selecionaConsulta->retornaConsulta('SELECT p.nome AS pnome, m.nome AS mnome, c.dataC, c.statusC, c.diagnostico, c.tratamento, c.valor, c.horarioInicio, c.horarioFim, c.id FROM consultas c INNER JOIN medicos m ON m.id = c.id_medico INNER JOIN pacientes p ON p.id = c.id_paciente;');
        $this->loadView(
            'editarConsulta', ['consultas' => $consultas]
        );
    }
    public function buscapaciente(){
        verificaLogin();
        $array_valores = [':nome' => $_POST['busca'] . '%'];
        $sql = 'SELECT p.nome AS pnome, m.nome AS mnome, c.dataC, c.statusC, c.diagnostico, c.tratamento, c.valor, c.horarioInicio, c.horarioFim, c.id FROM consultas c INNER JOIN medicos m ON m.id = c.id_medico INNER JOIN pacientes p ON p.id = c.id_paciente WHERE p.nome LIKE :nome';
        $selecionaConsulta = new AppointmentRepository;
        $consultas = $selecionaConsulta->retornaConsulta($sql, $array_valores);
        $this->loadView(
            'editarConsulta', ['consultas' => $consultas]
        );
    }
    public function editapaciente(){
        verificaLogin();
        $selecionaConsulta = new AppointmentRepository;
        $link = $_SERVER['REQUEST_URI'];
        $partelink = explode('/', $link);
        $id = end($partelink);
        $array_valores = [':id' => $id];
        $sql = 'SELECT statusC, horarioInicio, horarioFim, diagnostico, tratamento, valor, dataC FROM consultas WHERE id = :id';
        $consultas = $selecionaConsulta->retornaConsulta($sql, $array_valores);
        $this->loadView(
            'editaform', ['consultas' => $consultas]
        );
    }
}
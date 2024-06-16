<?php
ob_start();
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class VisualizaconsultaController extends RenderView {
    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
        }
        $verifyLogin = new Login();
        if(!$verifyLogin->verifyLoginPatient()){
            if($verifyLogin->verifyLoginDoctor() || $verifyLogin->verifyLoginEmployee()){
                header('Location: funcionario');
                exit();
            }
            header('Location: ../Site');
            exit();
        }
        $array_valores = [':id' => $_SESSION['login_id']];
        $sql = 'SELECT m.nome AS mnome, c.dataC, c.statusC, c.diagnostico, c.tratamento, c.valor, c.horarioInicio, c.horarioFim, c.id FROM consultas c INNER JOIN medicos m ON m.id = c.id_medico INNER JOIN pacientes p ON p.id = c.id_paciente WHERE p.id = :id';
        $selecionaConsulta = new AppointmentRepository;
        $consultas = $selecionaConsulta->retornaConsulta($sql, $array_valores);
        $this->loadView(
            'visualizarConsulta', ['consultas' => $consultas]
        );
    }
}
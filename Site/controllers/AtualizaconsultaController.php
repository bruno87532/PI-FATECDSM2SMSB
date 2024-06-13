<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";


class AtualizaconsultaController extends RenderView {
    public $id;
    public function __construct(){
        $parts = explode('/', $_SERVER['REQUEST_URI']);
        $this->id = end($parts);
    }
    public function index() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
            header('Location: ../');
            exit();
        }
        $verifyLogin = new Login();
        if(!($verifyLogin->verifyLoginDoctor()) && !($verifyLogin->verifyLoginEmployee())){
            header('Location: ../');
            exit();
        }
        $selecionaConsulta = new AppointmentRepository;
        $array_valores = [':id' => $this->id];
        $sql = 'SELECT id, statusC, horarioInicio, horarioFim, diagnostico, tratamento, valor, dataC FROM consultas WHERE id = :id';
        $consultas = $selecionaConsulta->retornaConsulta($sql, $array_valores);
        $this->loadView(
            'editaform', ['consultas' => $consultas]
        );
    }
    public function atualizapaciente() {
        if(empty($_SERVER['HTTP_REFERER'])){
            $clearSessions = new Validator();
            $clearSessions->destroi_sessao();
            header('Location: ../');
            exit();
        }
        $verifyLogin = new Login();
        if(!($verifyLogin->verifyLoginDoctor()) && !($verifyLogin->verifyLoginEmployee())){
            header('Location: ../Site');
        }
        $tratamento = (isset($_POST['tratamento'])) ? $_POST['tratamento'] : NULL;
        $diagnostico = (isset($_POST['diagnostico'])) ? $_POST['diagnostico'] : NULL;
        $array_campos = ['dataC', 'horarioInicio', 'horarioFim', 'diagnostico', 'tratamento', 'valor', 'statusC'];
        $array_valores = [$_POST['dataC'], $_POST['hInicio'], $_POST['hFim'], $diagnostico, $tratamento, $_POST['valor'], $_POST['statusC']];
        $updateConsulta = new AppointmentRepository;
        $updateConsulta->prepareUpdate($array_campos, 'consultas', $array_valores, $this->id);
        header('Location: ../editaconsulta');
    }
}
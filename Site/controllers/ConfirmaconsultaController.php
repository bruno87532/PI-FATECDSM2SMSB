<?php
ob_start();
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class ConfirmaconsultaController extends RenderView {
    public function index(){
        $post = ['especializacao', 'medicos', 'data', 'horario'];
        foreach($post as $campo){
            if(!(isset($campo))){
                header('Location: ../consulta');
                exit();
            }
        }
        $array_campos = ['id_medico', 'id_paciente', 'horarioInicio', 'dataC', 'statusC'];
        $array_valores = [$_POST['medicos'], $_SESSION['login_id'], $_POST['horario'], $_POST['data'], 'a'];
        $consulta = new AppointmentRepository();
        $consulta->prepareInsert($array_campos, 'consultas', $array_valores);
        header('Location: ../../Site');
    }
}
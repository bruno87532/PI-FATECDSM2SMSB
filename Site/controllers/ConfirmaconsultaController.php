<?php
ob_start();
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class ConfirmaconsultaController extends RenderView {
    public function index(){
        if(isset($_SESSION['cpfpat'])){
            unset($_SESSION['cpfpat']);
        }
        $post = (isset($_SESSION['employee'])) ? ['especializacao', 'medicos', 'data', 'horario', 'cpfpat'] : ['especializacao', 'medicos', 'data', 'horario'];
        if(isset($_SESSION['employee'])){
            $cpfExist = new PatientRepository();
            $array_valores = ['cpf' => $_POST['cpfpat']];
            $sql = 'SELECT id FROM pacientes WHERE cpf = :cpf';
            $exist = $cpfExist->retornaConsulta($sql, $array_valores);
            if(!($exist)){
                $_SESSION['cpfpat'] = true;
                header('Location: ../consulta');
                exit();
            }
        }    
        foreach($post as $campo){
            if(!(isset($campo))){
                header('Location: ../consulta');
                exit();
            }
        }
        $array_campos = ['id_medico', 'id_paciente', 'horarioInicio', 'dataC', 'statusC'];
        $array_valores = isset($_SESSION['employee']) ? [$_POST['medicos'], $exist[0]['id'], $_POST['horario'], $_POST['data'], 'a'] : [$_POST['medicos'], $_SESSION['login_id'], $_POST['horario'], $_POST['data'], 'a'];;
        $consulta = new AppointmentRepository();
        $consulta->prepareInsert($array_campos, 'consultas', $array_valores);
        header('Location: ../../Site');
    }
}
<?php

require_once __DIR__."/../utils/autoload.php";

class AppointmentRepository extends Repository
{
    public function CreateAppointment(Appointment $appointment)
    {
        $array_campos = ['statusC', 'id_medico', 'id_paciente', 'horarioInicio', 'horarioFim', 'diagnostico', 'tratamento', 'valor', 'dataConsulta'];
        $array_valores = [$StatusConsulta, $IdMedico, $IdPaciente, $HorarioInicio, $HorarioFim, $Diagnostico, $Tratamento, $Valor, $DataConsulta];
        $this->prepareInsert($array_campos, 'consultas', $array_valores);
    }

}

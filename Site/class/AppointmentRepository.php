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

    public function SelectAppointment($id)
    {
        try
        {
            $sql = "SELECT * FROM consultas WHERE id = :id"; 
    
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bindParam(':id', $id); 
            $stmt->execute();
    
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if($resultado)
            {
                $appointment = new Appointment();
                $appointment->setStatusConsulta($resultado['statusC']); 
                $appointment->setIdMedico($resultado['id_medico']);
                $appointment->setIdPaciente($resultado['id_paciente']);
                $appointment->setHorarioInicio($resultado['horarioInicio']);
                $appointment->setHorarioFim($resultado['horarioFim']); 
                $appointment->setDiagnostico($resultado['diagnostico']);
                $appointment->setTratamento($resultado['tratamento']);
                $appointment->setValor($resultado['valor']);
                $appointment->setDataConsulta($resultado['dataC']); 
    
                return $appointment;
            }
            else
            {
                return null; 
            }
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao selecionar consulta: ".$e->getMessage());
        }
    }
}

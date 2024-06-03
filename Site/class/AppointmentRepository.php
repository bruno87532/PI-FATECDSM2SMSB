<?php

require_once __DIR__."/../utils/autoload.php";

class AppointmentRepository
{
    private $conexao;

    public function  __construct()
    {
        try 
        {
            $this->conexao = new conexao();
        } 
        catch (Exception $e)
        {
            throw new Exception("Não foi possível conectar-se ao banco de dados: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        if ($this->conexao) {
            $this->conexao = null;
        }
    }

    public function CreateAppointment(Appointment $appointment)
    {
        try
        {
            $sql = "INSERT INTO pacientes (statusC, id_medico, id_paciente, horarioInicio, horarioFim, diagnostico, tratamento, valor, dataC) 
                    VALUES (:statusConsulta, :idMedico, :idPaciente, :horarioInicio, :horarioFim, :diagnostico, :tratamento, :valor, :dataConsulta)"; // Removidas as aspas simples dos marcadores de posição

            $stmt = $this->conexao->getConexao()->prepare($sql); 

            $StatusConsulta = $appointment->getStatusConsulta();
            $IdMedico = $appointment->getIdMedico();
            $IdPaciente = $appointment->getIdPaciente();
            $HorarioInicio = $appointment->getHorarioInicio();
            $HorarioFim = $appointment->getHorarioFim();
            $Diagnostico = $appointment->getDiagnostico();
            $Tratamento = $appointment->getTratamento();
            $Valor = $appointment->getValor();
            $DataConsulta = $appointment->getDataConsulta(); 

            $stmt->bindParam(':statusConsulta', $StatusConsulta);
            $stmt->bindParam(':idMedico', $IdMedico);
            $stmt->bindParam(':idPaciente', $IdPaciente);
            $stmt->bindParam(':horarioInicio', $HorarioInicio);
            $stmt->bindParam(':horarioFim', $HorarioFim); 
            $stmt->bindParam(':diagnostico', $Diagnostico);
            $stmt->bindParam(':tratamento', $Tratamento);
            $stmt->bindParam(':valor', $Valor);
            $stmt->bindParam(':dataConsulta', $DataConsulta); 

            $stmt->execute();
            return $this->conexao->getConexao()->lastInsertId();
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao criar paciente: ".$e->getMessage());
        }
    
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
    

    //password_verify()
}

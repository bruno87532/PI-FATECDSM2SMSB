<?php
require_once __DIR__."/../utils/autoload.php";
class Appointment
{
    public $Id;
    public $StatusConsulta;
    public $IdMedico;
    public $IdPaciente;
    public $HorarioInicio;
    public $HorarioFim;
    public $Diagnostico;
    public $Tratamento;
    public $Valor;
    public $DataConsulta;

    public function getId() {
        return $this->Id;
    }

    public function getStatusConsulta() {
        return $this->StatusConsulta;
    }

    public function getIdMedico() {
        return $this->IdMedico;
    }

    public function getIdPaciente() {
        return $this->IdPaciente;
    }

    public function getHorarioInicio() {
        return $this->HorarioInicio;
    }

    public function getHorarioFim() {
        return $this->HorarioFim;
    }

    public function getDiagnostico() {
        return $this->Diagnostico;
    }

    public function getTratamento() {
        return $this->Tratamento;
    }

    public function getValor() {
        return $this->Valor;
    }

    public function getDataConsulta() {
        return $this->DataConsulta;
    }

    // Métodos Set
    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setStatusConsulta($StatusConsulta) {
        $this->StatusConsulta = $StatusConsulta;
    }

    public function setIdMedico($IdMedico) {
        $this->IdMedico = $IdMedico;
    }

    public function setIdPaciente($IdPaciente) {
        $this->IdPaciente = $IdPaciente;
    }

    public function setHorarioInicio($HorarioInicio) {
        $this->HorarioInicio = $HorarioInicio;
    }

    public function setHorarioFim($HorarioFim) {
        $this->HorarioFim = $HorarioFim;
    }

    public function setDiagnostico($Diagnostico) {
        $this->Diagnostico = $Diagnostico;
    }

    public function setTratamento($Tratamento) {
        $this->Tratamento = $Tratamento;
    }

    public function setValor($Valor) {
        $this->Valor = $Valor;
    }

    public function setDataConsulta($DataConsulta) {
        $this->DataConsulta = $DataConsulta;
    }
}

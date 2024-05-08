<?php

class Consulta
{
    public int $Id;
    public int $StatusConsulta;
    public int $IdMedico;
    public int $IdPaciente;
    public DateTime $HorarioInicio;
    public DateTime $HorarioFim;
    public string $diagnistico;
    public string $tratamento;
    public double $valor;
    public DateTime $DataConsulta;
}
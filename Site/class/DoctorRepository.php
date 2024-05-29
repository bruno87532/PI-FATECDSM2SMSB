<?php

require_once __DIR__."/../models/conexao.php"; 
require_once __DIR__ ."/Doctor.php"; 

class DoctorRepository
{
    private $conexao;

    public function __construct()
    {
        try 
        {
            $this->conexao = new Conexao(); 
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

    public function getById($id)
    {
        try
        {
            $sql = "SELECT * FROM medicos WHERE id = :id";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if($resultado)
            {
                $doctor = new Doctor();
                $doctor->setId($resultado['id']);
                $doctor->setNome($resultado['nome']);
                

                return $doctor;
            }
            else
            {
                return null; 
            }
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao selecionar médico: ".$e->getMessage());
        }
    }

    
}

?>

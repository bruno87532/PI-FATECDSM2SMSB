<?php

require_once "C:\xampp\htdocs\PI-FATECDSM2SMSB\Site\banco/conexao.php";
require_once "../classes/Paciente";
class PacienteRepository
{
    private $conexao;

   public function  __construct()
   {
       $this->conexao = new Conexao();

       if(!$this->conexao){
           throw new Exception("Não foi possível conectar-se ao banco de dados");
       }
   }
    public function SelecionaPaciente($id)
    {
        try
        {
            $sql = "SELECT nome, senha FROM pacientes WHERE id = $id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if($resultado)
            {
                $paciente = new Paciente();
                $paciente->setNome($resultado['nome']);
                $paciente->setSenha($resultado['senha']);
                return $paciente;
            }
            else
            {
                return null;
            }

        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao selecionar paciente: ".$e->getMessage());
        }

        //exemplo de uso

        // $pacienteRepo = new PacienteRepository();
        // $paciente = $pacienteRepo->SelecionaPaciente(1); // Passando o ID do paciente desejado
        // if($paciente){
        //     echo "Nome do paciente: " . $paciente->getNome() . "<br>";
        //     echo "Senha do paciente: " . $paciente->getSenha() . "<br>";
        // } else {
        //     echo "Paciente não encontrado.";
        // }
    }

    public function createPaciente(Paciente $paciente)
    {
        try
        {
            $sql = "INSERT INTO pacientes (nome, cpf, nascimento, telefone, email, necessidadeEspecial, necessidade, idoso, genero, senha) 
                    VALUES (:nome, :cpf, :nascimento, :telefone, :email, :necessidadeEspecial, :necessidade, :idoso, :genero, :senha)";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            // Bind dos parâmetros
            $stmt->bindParam(':nome', $paciente->getNome());
            $stmt->bindParam(':cpf', $paciente->getCpf());
            $stmt->bindParam(':nascimento', $paciente->getNascimento());
            $stmt->bindParam(':telefone', $paciente->getTelefone());
            $stmt->bindParam(':email', $paciente->getEmail());
            $stmt->bindParam(':necessidadeEspecial', $paciente->getNecessidadeEspecial());
            $stmt->bindParam(':necessidade', $paciente->getNecessidade());
            $stmt->bindParam(':idoso', $paciente->getIdoso());
            $stmt->bindParam(':genero', $paciente->getGenero());
            $stmt->bindParam(':senha', $paciente->getSenha());
            // Execução da consulta
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao criar paciente: ".$e->getMessage());
        }

        //exemplo de uso

        // $pacienteRepo = new PacienteRepository();

        // Criando um novo objeto Paciente
        // $paciente = new Paciente();
        // $paciente->setNome("Nome do Paciente");
        // $paciente->setCpf("123.456.789-00");
        // Setar outros atributos do paciente conforme necessário

        // Chamando o método createPaciente() para inserir o paciente no banco de dados
        // try {
        //     $pacienteRepo->createPaciente($paciente);
        //     echo "Paciente criado com sucesso!";
        // } catch (Exception $e) {
        //     echo "Erro ao criar paciente: " . $e->getMessage();
        // }

    }
}
?>
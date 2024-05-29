<?php

require_once __DIR__."/../models/conexao.php";
require_once __DIR__ ."/Patient.php";

class PatientRepository
{
    private $conexao;

    public function  __construct()
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
                $paciente = new Patient();
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
    }

    public function CreateEndereco(Endereco $endereco)
    {
        try
        {
            $sql = "INSERT INTO enderecos (cep, estado, cidade, bairro, rua, numeroCasa, complemento) 
                    VALUES (:cep, :estado, :cidade, :bairro, :rua, :numero, :complemento)";
            $stmt = $this->conexao->getConexao()->prepare($sql);

            $cep = $endereco->getCep();
            $estado = $endereco->getEstado();
            $cidade = $endereco->getCidade();
            $bairro = $endereco->getBairro();
            $rua = $endereco->getRua();
            $numero = $endereco->getNumero();
            $complemento = $endereco->getComplemento();

            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':numero', $numero);
            $stmt->bindParam(':complemento', $complemento);

            $stmt->execute();
            return $this->conexao->getConexao()->lastInsertId();
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao criar paciente: ".$e->getMessage());
        }
    }

    public function CreatePaciente(Paciente $paciente, $id)
    {
        try
        {
            $sql = "INSERT INTO pacientes (nome, cpf, nascimento, telefone, email, necessidadeEspecial, necessidadeTipo, idoso, genero, id_endereco, senha) 
                    VALUES (:nome, :cpf, :nascimento, :telefone, :email, :necessidadeEspecial, :necessidade, :idoso, :genero, :id, :senha)";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            // Bind dos parâmetros
           // Atribua os valores de retorno dos métodos às variáveis
            $nome = $paciente->getNome();
            $cpf = $paciente->getCpf();
            $nascimento = $paciente->getNascimento();
            $telefone = $paciente->getTelefone();
            $email = $paciente->getEmail();
            $necessidadeEspecial = $paciente->getNecessidadeEspecial();
            $necessidade = $paciente->getNecessidade();
            $idoso = $paciente->getIdoso();
            $genero = $paciente->getGenero();
            $senha = $paciente->getSenha();

            // Passe as variáveis como argumentos para bindParam()
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':nascimento', $nascimento);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':necessidadeEspecial', $necessidadeEspecial);
            $stmt->bindParam(':necessidade', $necessidade);
            $stmt->bindParam(':idoso', $idoso);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':senha', $senha);

            // Execução da consulta
            $stmt->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao criar paciente: ".$e->getMessage());
        }
    }
}
?>
<?php

require_once __DIR__."/../utils/autoload.php";

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
    public function SelecionaMedico($email, $password){
        $pdo = $this->conexao->getConexao();
        $sqlM = "SELECT id, email, nome, senha FROM medicos WHERE email = :email";
        $stmtM = $pdo->prepare($sqlM);
        $stmtM->bindParam(':email',  $email);
        $stmtM->execute();
        $resultM = $stmtM->fetch(PDO::FETCH_ASSOC);
        if($resultM){
            if($resultF['senha'] == $password){
                $loginDoctor = new Login();
                $loginDoctor->loginDoctor($resultM['id'], $resultM['nome']);
                return true;
            }else{
                $_SESSION['login_error'] = true;
                return false;
            }
        }
        else{
            $_SESSION['login_error'] = true;
            return false;
        }
    }
    public function SelecionaEmail($email)
    {
        $pdo = $this->conexao->getConexao();
        $sqlM = "SELECT email FROM medicos WHERE email = :email";
        $stmtM = $pdo->prepare($sqlM);
        $stmtM->bindParam(':email', $email);
        $stmtM->execute();

        $resultM = $stmtM->fetch(PDO::FETCH_ASSOC);
        if ($resultM) {
            return false;
        } else {
            return true;
        }
    }

    public function SelecionaCrm($crm)
    {
        $pdo = $this->conexao->getConexao();
        $sqlM = "SELECT crm FROM medicos WHERE crm = :crm";
        $stmtM = $pdo->prepare($sqlM);
        $stmtM->bindParam(':crm', $crm);
        $stmtM->execute();

        $resultM = $stmtM->fetch(PDO::FETCH_ASSOC);
        if ($resultM) {
            return false;
        } else {
            return true;
        }
    }

    public function SelecionaCPF($cpf)
    {
        $pdo = $this->conexao->getConexao();
        $sqlM = "SELECT cpf FROM medicos WHERE cpf = :cpf";
        $stmtM = $pdo->prepare($sqlM);
        $stmtM->bindParam(':cpf', $cpf);
        $stmtM->execute();

        $resultM = $stmtM->fetch(PDO::FETCH_ASSOC);
        if ($resultM) {
            return false;
        } else {
            return true;
        }
    }
    public function CreateEndereco(Address $endereco)
    {
        try
        {
            $sqlM = "INSERT INTO enderecos (cep, estado, cidade, bairro, rua, numeroCasa, complemento) 
                    VALUES (:cep, :estado, :cidade, :bairro, :rua, :numero, :complemento)";
            $stmtM = $this->conexao->getConexao()->prepare($sqlM);

            $cep = $endereco->getCep();
            $estado = $endereco->getEstado();
            $cidade = $endereco->getCidade();
            $bairro = $endereco->getBairro();
            $rua = $endereco->getRua();
            $numero = $endereco->getNumero();
            $complemento = $endereco->getComplemento();

            $stmtM->bindParam(':cep', $cep);
            $stmtM->bindParam(':estado', $estado);
            $stmtM->bindParam(':cidade', $cidade);
            $stmtM->bindParam(':bairro', $bairro);
            $stmtM->bindParam(':rua', $rua);
            $stmtM->bindParam(':numero', $numero);
            $stmtM->bindParam(':complemento', $complemento);

            $stmtM->execute();
            return $this->conexao->getConexao()->lastInsertId();
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao criar médico: ".$e->getMessage());
        }
    }

    public function CreateDoctor(Doctor $doctor, $ide, $idf)
    {
        try
        {
            $sqlM = "INSERT INTO medicos (nome, cpf, nascimento, telefone, crm, disponibilidadeInicio, disponibilidadeFim, especialidade, email, genero, id_endereco, id_funcionario, senha) 
                    VALUES (:nome, :cpf, :nascimento, :telefone, :crm, :disponibilidadeInicio, :disponibilidadeFim, :especialidade, :email, :genero, :ide, :idf, :senha)";
            $stmtM = $this->conexao->getConexao()->prepare($sqlM);
            // Bind dos parâmetros
           // Atribua os valores de retorno dos métodos às variáveis
            $nome = $doctor->getNome();
            $cpf = $doctor->getCpf();
            $nascimento = $doctor->getNascimento();
            $telefone = $doctor->getTelefone();
            $crm = $doctor->getCrm();
            $disponibilidadeInicio = $doctor->getDisponibilidadeInicio();
            $disponibilidadeFim = $doctor->getDisponibilidadeFim();
            $especialidade = $doctor->getEspecialidade();
            $email = $doctor->getEmail();
            $genero = $doctor->getGenero();
            $senha = $doctor->getSenha();
            $hash = password_hash($senha, PASSWORD_DEFAULT);

            // Passe as variáveis como argumentos para bindParam()
            $stmtM->bindParam(':nome', $nome);
            $stmtM->bindParam(':cpf', $cpf);
            $stmtM->bindParam(':nascimento', $nascimento);
            $stmtM->bindParam(':telefone', $telefone);
            $stmtM->bindParam(':crm', $crm);
            $stmtM->bindParam(':disponibilidadeInicio', $disponibilidadeInicio);
            $stmtM->bindParam(':disponibilidadeFim', $disponibilidadeFim);
            $stmtM->bindParam(':especialidade', $especialidade);
            $stmtM->bindParam(':email', $email);
            $stmtM->bindParam(':genero', $genero);
            $stmtM->bindParam(':ide', $ide);
            $stmtM->bindParam(':idf', $idf);
            $stmtM->bindParam(':senha', $hash);

            // Execução da consulta
            $stmtM->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao criar paciente: ".$e->getMessage());
        }
    }
    
}

?>

<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";
class Doctor
{
    private ?int $Id;
    private ?int $IdEndereco;
    private ?int $IdFuncionario;
    private $Cpf;
    private $Nome;
    private $Nascimento;
    private $Email;
    private $Senha;
    private $Telefone;
    private $Crm;
    private $DisponibilidadeInicio;
    private $DisponibilidadeFim;
    private $Genero;
    private $Especialidade;

    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getIdEndereco()
    {
        return $this->IdEndereco;
    }

    public function setIdEndereco($IdEndereco)
    {
        $this->IdEndereco = $IdEndereco;
    }

    public function getIdFuncionario()
    {
        return $this->IdFuncionario;
    }

    public function setIdFuncionario($IdFuncionario)
    {
        $this->IdFuncionario = $IdFuncionario;
    }

    public function getCpf()
    {
        return $this->Cpf;
    }

    public function setCpf($Cpf)
    {
        $this->Cpf = $Cpf;
    }

    public function getNome()
    {
        return $this->Nome;
    }

    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    public function getSenha()
    {
        return $this->Senha;
    }

    public function setSenha($Senha)
    {
        $this->Senha = $Senha;
    }

    public function getNascimento()
    {
        return $this->Nascimento;
    }

    public function setNascimento($Nascimento)
    {
        $this->Nascimento = $Nascimento;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getTelefone()
    {
        return $this->Telefone;
    }

    public function setTelefone($Telefone)
    {
        $this->Telefone = $Telefone;
    }

    public function getCrm()
    {
        return $this->Crm;
    }

    public function setCrm($Crm)
    {
        $this->Crm = $Crm;
    }

    public function getDisponibilidadeInicio()
    {
        return $this->DisponibilidadeInicio;
    }

    public function setDisponibilidadeInicio($DisponibilidadeInicio)
    {
        $this->DisponibilidadeInicio = $DisponibilidadeInicio;
    }

    public function getDisponibilidadeFim()
    {
        return $this->DisponibilidadeFim;
    }

    public function setDisponibilidadeFim($DisponibilidadeFim)
    {
        $this->DisponibilidadeFim = $DisponibilidadeFim;
    }

    public function getGenero()
    {
        return $this->Genero;
    }

    public function setGenero($Genero)
    {
        $this->Genero = $Genero;
    }

    public function getEspecialidade()
    {
        return $this->Especialidade;
    }

    public function setEspecialidade($Especialidade)
    {
        $this->Especialidade = $Especialidade;
    }

    public static function novoDoctor($cpf, $nome, $nascimento, $email, $senha, $telefone, $crm, $inicio, $fim, $genero, $especialidade){
        $doctor = new Doctor();
        $doctor->setCpf($cpf);
        $doctor->setNome($nome);
        $doctor->setNascimento($nascimento);
        $doctor->setEmail($email);
        $doctor->setSenha($senha);
        $doctor->setTelefone($telefone);
        $doctor->setCrm($crm);
        $doctor->setDisponibilidadeInicio($inicio);
        $doctor->setDisponibilidadeFim($fim);
        $doctor->setGenero($genero);
        $doctor->setEspecialidade($especialidade);
        $_SESSION['doctor'] = $doctor;
    }
}

?>

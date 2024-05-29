<?php

class Patient{

    public Endereco $endereco;
    public $id;
    public $nome;
    public $cpf;
    public $nascimento;
    public $telefone;
    public $email;
    public ?int $necessidadeEspecial;
    public ?string $necessidade;
    public ?int $idoso;
    public $genero;
    public $senha;

     // Métodos getters
     public function getId(){
        return $this->id;
     }
     public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNecessidadeEspecial() {
        return $this->necessidadeEspecial;
    }

    public function getNecessidade() {
        return $this->necessidade;
    }

    public function getIdoso() {
        return $this->idoso;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    // Métodos setters
    public function setEndereco(Endereco $endereco) {
        $this->endereco = $endereco;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNecessidadeEspecial($necessidadeEspecial) {
        $this->necessidadeEspecial = $necessidadeEspecial;
    }

    public function setNecessidade($necessidade) {
        $this->necessidade = $necessidade;
    }

    public function setIdoso($idoso) {
        $this->idoso = $idoso;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public static function novoPaciente($nome, $cpf, $data_nascimento, $telefone, $email, $senha, $sexo, $pcd = NULL, $deficiencia = NULL, $idoso = NULL){
        $paciente = new Paciente();
        $paciente->setNome($nome);
        $paciente->setCpf($cpf);
        $paciente->setNascimento($data_nascimento);
        $paciente->setTelefone($telefone);
        $paciente->setEmail($email);
        $paciente->setSenha($senha);
        $paciente->setGenero($sexo);
        if(isset($pcd) && $pcd == 1){
            $paciente->setNecessidadeEspecial(1);
            $paciente->setNecessidade($deficiencia);   
        }else{
            $paciente->setNecessidadeEspecial(0);
        }
        if(isset($idoso) && $idoso == 1){
            $paciente->setIdoso(1);
        }else{
            $paciente->setIDoso(0);
        }
        $_SESSION["paciente"] = $paciente;
    }
}



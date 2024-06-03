<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";
class Patient{

    public Endereco $endereco;
    public ?int $id;
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
        $patient = new Patient();
        $patient->setNome($nome);
        $patient->setCpf($cpf);
        $patient->setNascimento($data_nascimento);
        $patient->setTelefone($telefone);
        $patient->setEmail($email);
        $patient->setSenha($senha);
        $patient->setGenero($sexo);
        if(isset($pcd) && $pcd == 1){
            $patient->setNecessidadeEspecial(1);
            $patient->setNecessidade($deficiencia);   
        }else{
            $patient->setNecessidadeEspecial(0);
        }
        if(isset($idoso) && $idoso == 1){
            $patient->setIdoso(1);
        }else{
            $patient->setIDoso(0);
        }
        $_SESSION["patient"] = $patient;
    }
}



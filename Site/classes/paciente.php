<?php

class Paciente{

    public Endereco $endereco;
    public $id;
    public $nome;
    public $cpf;
    public $nascimento;
    public $telefone;
    public $email;
    public $necessidadeEspecial;
    public $necessidade;
    public $idoso;
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
    public function preencheRetorno($nome, $cpf, $email, $telefone, $nascimento, $sexo, $pcd = NULL, $idoso = NULL, $deficiencia = NULL){
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setTelefone($telefone);
        $this->setNascimento($nascimento);
        $this->setGenero($sexo);
        if($pcd != NULL){
            $this->setNecessidadeEspecial(1);
            $this->setNecessidade($deficiencia);
        }
        if($idoso != NULL){
            $this->setIdoso(1);
        }
    }
}



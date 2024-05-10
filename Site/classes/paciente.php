<?php
class Paciente{
    public $nome;
    public $cpf;
    public $nascimento;
    public $telefone;
    public $email;
    public $boolNecessidadeEspecial;
    public $necessidade;
    public $idoso;
    public $genero;
    public function __construct($nome, $cpf, $nascimento, $telefone, $email, $boolNecessidadeEspecial = NULL, $idoso = NULL, $necessidade = NULL, $genero){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->nascimento = $nascimento;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->boolNecessidadeEspecial = $boolNecessidadeEspecial;
        $this->idoso = $idoso;
        $this->necessidade = $necessidade;
        $this->genero = $genero;
    }
}
?>
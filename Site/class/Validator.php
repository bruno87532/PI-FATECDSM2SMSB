<?php
require_once __DIR__."/../views/cadastro.php";
class Validator{
    
    public $controla_cpf;
    public $controla_email;
    public $controla_telefone;
    public $controla_nascimento;
    public $controla_nome;
    public $controla_pid;
    public $controla_deficiencia;
    public $controla_senha;

    public function cpf_valido(){
        if(isset($_SESSION["cpf"]) && $_SESSION["cpf"] == true){
            $this->controla_cpf = "color: red; display: block";
            return $this->controla_cpf;
        }else{
            $this->controla_cpf = "color: red; display: none";
            return $this->controla_cpf;
        }
    }
    public function email_valido(){
        if(isset($_SESSION["email"]) && $_SESSION["email"] == true){
            $this->controla_email = "color: red; display: block";
            return $this->controla_email;
        }else{
            $this->controla_email = "color: red; display: none";
            return $this->controla_email;
        }
    }
    public function telefone_valido(){
        if(isset($_SESSION["telefone"]) && $_SESSION["telefone"] == true){
            $this->controla_telefone = "color: red; display: block";
            return $this->controla_telefone;
        }else{
            $this->controla_telefone = "color: red; display: none";
            return $this->controla_telefone;
        }
    }
    public function nascimento_valido(){
        if(isset($_SESSION["nascimento"]) && $_SESSION["nascimento"] == true){
            $this->controla_nascimento = "color: red; display: block";
            return $this->controla_nascimento;
        }else{
            $this->controla_nascimento = "color: red; display: none";
            return $this->controla_nascimento;
        }
    }
    public function nome_valido(){
        if(isset($_SESSION["nome"]) && $_SESSION["nome"] == true){
            $this->controla_nome = "color: red; display: block";
            return $this->controla_nome;
        }else{
            $this->controla_nome = "color: red; display: none";
            return $this->controla_nome;
        }
    }
    public function pid_valido(){
        if(isset($_SESSION["pid"]) && $_SESSION["pid"] == true){
            $this->controla_pid = "color: red; display: block";
            return $this->controla_pid;
        }else{
            $this->controla_pid = "color: red; display: none";
            return $this->controla_pid;
        }
    }
    public function senha_valido(){
        if(isset($_SESSION["senha"]) && $_SESSION["senha"] == true){
            $this->controla_senha = "color: red; display: block";
            return $this->controla_senha;
        }else{
            $this->controla_senha = "color: red; display: none";
            return $this->controla_senha;
        }
    }
    public function deficiencia_valido(){
        if(isset($_SESSION["deficiencia"]) && $_SESSION["deficiencia"] == true){
            $this->controla_deficiencia = "color: red; display: block";
            return $this->controla_deficiencia;
        }else{
            $this->controla_deficiencia = "color: red; display: none";
            return $this->controla_deficiencia;
        }
    }
    public function destroi_sessao(){
        if(isset($_SESSION["cpf"]) && $_SESSION["cpf"] == true){
            unset($_SESSION["cpf"]);
        }
        if(isset($_SESSION["email"]) && $_SESSION["email"] == true){
            unset($_SESSION["email"]);
        }
        if(isset($_SESSION["telefone"]) && $_SESSION["telefone"] == true){
            unset($_SESSION["telefone"]);
        }
        if(isset($_SESSION["nascimento"]) && $_SESSION["nascimento"] == true){
            unset($_SESSION["nascimento"]);
        }
        if(isset($_SESSION["nome"]) && $_SESSION["nome"] == true){
            unset($_SESSION["nome"]);
        }
        if(isset($_SESSION["pid"]) && $_SESSION["pid"] == true){
            unset($_SESSION["pid"]);
        }
        if(isset($_SESSION["deficiencia"]) && $_SESSION["deficiencia"] == true){
            unset($_SESSION["deficiencia"]);
        }
        if(isset($_SESSION["senha"]) && $_SESSION["senha"] == true){
            unset($_SESSION["senha"]);
        }
        if(isset($_SESSION["paciente"])){
            unset($_SESSION["paciente"]);
        }
        if(isset($_SESSION["endereco"])){
            unset($_SESSION["endereco"]);
        }
    }
}
?>
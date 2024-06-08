<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/Functions.php";
require_once __DIR__."/../utils/autoload.php"; 
class FunctionsPatient extends Functions{
    public function valida_cpfexist($cpf)
    {
        $cpfexist = new PatientRepository();
        $cpfexistr = $cpfexist->SelecionaCPF($cpf);
        $cpfexistm = new DoctorRepository();
        $cpfexistmr = $cpfexistm->SelecionaCPF($cpf);
        if(!($cpfexistr && $cpfexistmr)){
            return false;
        }
        return true;
    }
    public function valida_emailexist($email){
        $emailexist = new PatientRepository();
        $emailexistr = $emailexist->SelecionaEmail($email);
        $emailexistm = new DoctorRepository();
        $emailexistmr = $emailexistm->SelecionaEmail($email);
        if(!($emailexistr && $emailexistmr)){
            return false;
        }
        return true;
    }
    public function validaCampos($nome, $cpf, $senha, $telefone, $nascimento, $email){
        $nome_valido = $this->validaNome($nome);
        if(!$nome_valido){
            $_SESSION["nome"] = true;
            return false;
        }
        $cpf_exist = $this->valida_cpfexist($cpf);
        if(!$cpf_exist){
            $_SESSION["cpfexist"] = true;
            return false;
        }
        $cpf_valido = $this->validaCpf($cpf);
        if(!$cpf_valido){
            $_SESSION["cpf"] = true;
            return false;
        }
        $email_exist = $this->valida_emailexist($email);
        if(!$email_exist){
            $_SESSION["emailexist"] = true;
            return false;
        }
        $senha_valido = $this->validaSenha($senha);
        if(!$senha_valido){
            $_SESSION["senha"] = true;
            return false;
        }
        $telefone_valido = $this->validaTelefone($telefone);
        if(!$telefone_valido){
            $_SESSION["telefone"] = true;
            return false;
        }
        $nascimento_valido = $this->validaNascimento($nascimento);
        if(!$nascimento_valido){
            $_SESSION["nascimento"] = true;
            return false;
        }
        return true;
    }
}
?>
<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/Functions.php"; 
require_once __DIR__."/../utils/autoload.php";
class FunctionsMed extends Functions{
    public function validaCrm($crm){
        if(strlen($crm) != 11){
            return false;
        }
        if(substr($crm, 0, 4) != 'CRM-'){
            return false;
        }
        $arrayCrm = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ",  "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];
        $validaEst = 0;
        foreach($arrayCrm as $estCrm){
            if(substr($crm, 4, 2) == $estCrm){
                $validaEst = 1;
            }
        }
        if($validaEst != 1){
            return false;
        }
        if(!(ctype_digit(substr($crm, 6, 5)))){
            return false;
        }
        return true;
    }

    public function valida_cpfexist($cpf)
    {
        $cpfexist = new DoctorRepository();
        $cpfexistr = $cpfexist->SelecionaCPF($cpf);
        if(!$cpfexistr){
            return false;
        }
        return true;
    }
    public function valida_emailexist($email){
        $emailexist = new DoctorRepository();
        $emailexistr = $emailexist->SelecionaEmail($email);
        if(!$emailexistr){
            return false;
        }
        return true;
    }
    public function valida_crmexist($crm){
        $crmexist = new DoctorRepository();
        $crmexistr = $crmexist->SelecionaCrm($crm);
        if(!$crmexistr){
            return false;
        }
        return true;
    }

    public function validaCampos($nome, $cpf, $senha, $telefone, $nascimento, $email, $crm){
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
        $crm_exist = $this->valida_crmexist($crm);
        if(!$crm_exist){
            $_SESSION['crmexist'] = true;
            return false;
        }
        $crm_valido = $this->validaCrm($crm);
        if(!$crm_valido){
            $_SESSION['crm'] = true;
            return false;
        }
        return true;
    }
}
?>
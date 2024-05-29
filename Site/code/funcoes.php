<?php
class Funcionalidade
{
    function validaCpf($cpf){
        $cpf = preg_replace("/\D/", "", $cpf);
        if(strlen($cpf) != 11){
            return false;
        }
        $cpfBool1 = $this->validaDigitoCpf(substr($cpf, 0, 10), $this->numericoCpf(substr($cpf, 0, 9)));
        $cpfBool2 = $this->validaDigitoCpf(substr($cpf, 0, 11), $this->numericoCpf(substr($cpf, 0, 10)));
        return $cpfBool1 && $cpfBool2;
    }
    
    function validaDigitoCpf($cpf, $calculo){
        if($calculo == 0 || $calculo == 1){
            if(!($cpf[strlen($cpf) - 1] == 0)){
                return false;
            }
        }else{
            if(!(11 - $calculo == $cpf[strlen($cpf) - 1])){
                return false;  
            }
        }
    }
    function numericoCpf($substrCpf){
        $soma = 0;
        $peso = (strlen($substrCpf) + 1);
        for($x = 0; $x < strlen($substrCpf); $x++){
            $digito = $substrCpf[$x];
            $multiplicacao = $digito * $peso;
            $peso--;
            $soma += $multiplicacao; 
        }
        $soma = $soma % 11;
        return $soma;
    }
    function validaTelefone($telefone){
        $telefone2 = preg_replace("/[^a-zA-Z]/", "", $telefone);
        if(strlen($telefone2) > 0){
            return false;
        }
        $telefone = preg_replace("/\D/", "", $telefone);
        if(strlen($telefone) > 15 || strlen($telefone) < 10){
            return false;
        }
        return true;
    }
    function validaNome($nome){
        if(preg_match('/[0-9]/', $nome)){
            return false;
        }
        return true;
    }
    
    function validaNascimento($data){
        $hoje = date("Y-m-d");
        if($data <= "1900-01-01" || $data >= $hoje){
            return false;
        }
        return true;
    }
}

?>
<?php
function validaCpf($cpf){
    $cpf = preg_replace("/\D/", "", $cpf);
    if(strlen($cpf) != 11){
        return false;
        exit();
    }
    $cpfBool = validaDigitoCpf(substr($cpf, 0, 10), numericoCpf(substr($cpf, 0, 9)));
    $cpfBool = validaDigitoCpf(substr($cpf, 0, 11), numericoCpf(substr($cpf, 0, 10)));
    return true;
}
function validaDigitoCpf($cpf, $calculo){
    if($calculo == 0 || $calculo == 1){
        if(!($cpf[strlen($cpf) - 1] == 0)){
            return false;
            exit();
        }
    }else{
        if(!(11 - $calculo == $cpf[strlen($cpf) - 1])){
            return false;
            exit();
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
    $nome = preg_replace("/\D/", "", $nome);
    if(strlen($nome) != 0){
        return false;
    }
    return true;
}
function validaNascimento($data){
    $hoje = date("Y-m-d");
    if($data <= "01/01/1900" || $data >= $hoje){
        return false;
    }
    return true;
}
?>
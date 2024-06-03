<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";
class Functions
{
    public function validaCpf($cpf){
        $cpf = preg_replace("/\D/", "", $cpf);
        if(strlen($cpf) != 11){
            return false;
        }
        $cpfBool1 = $this->validaDigitoCpf(substr($cpf, 0, 10), $this->numericoCpf(substr($cpf, 0, 9)));
        $cpfBool2 = $this->validaDigitoCpf(substr($cpf, 0, 11), $this->numericoCpf(substr($cpf, 0, 10)));
        if(!$cpfBool1 || !$cpfBool2){
            return false;
        }
        return true;
    }
    
    public function validaDigitoCpf($cpf, $calculo){
        if($calculo == 0 || $calculo == 1){
            if(!($cpf[strlen($cpf) - 1] == 0)){
                return false;
            }
        }else{
            if(!(11 - $calculo == $cpf[strlen($cpf) - 1])){
                return false;  
            }
        }
        return true;
    }
    public function numericoCpf($substrCpf){
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
    public function validaTelefone($telefone){
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
    public function validaNome($nome){
        $nome2 = preg_replace("/[^a-zA-Z ]/", "", $nome);
        if(strlen($nome2) != strlen($nome)){
            return false;
        }
        return true;
    }
    
    public function validaNascimento($data){
        $hoje = date("Y-m-d");
        if($data <= "1900-01-01" || $data >= $hoje){
            return false;
        }
        return true;
    }
    public function validaSenha($senha){
        if(strlen($senha) < 8){
            return false;
        }
        return true;
    }
    public function validaCEP($cep) {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $resposta = file_get_contents($url);
        $cepValido = json_decode($resposta, true);
        if (!(isset($cepValido['cep']))) {
            return false;
        }
        return true;
    }
    public function verifyInsert($cep, $estado, $cidade, $bairro, $rua, $numero_casa){
        $post = [$cep, $estado, $cidade, $bairro, $rua, $numero_casa];
        foreach($post as $campo){
            if($campo == ""){
                header('Location: proximo');
                exit();
            }
        }

        $ParamAddress = [$cep, $estado, $cidade, $bairro, $rua, $numero_casa];
        if(isset($complemento) && $complemento != ''){
            $allParametersAddress = array_merge($ParamAddress, [$complemento]);
            call_user_func_array(['Address', 'novoEndereco'], $allParametersAddress);
        }else{
            call_user_func_array(['Address', 'novoEndereco'], $ParamAddress);
        }
    }  
}

?>
<?php
class pacienteRepository{
    private function validaNome($nome){

    }
    private function validaCPF($cpf){

    }
    private function validaNascimento($nascimento){

    }
    private function validaTelefone($telefone){

    }
    private function validaEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
}
?>
<?php
require_once __DIR__."/Validator.php";
require_once __DIR__."/../utils/autoload.php";
if(!(class_exists('ValidatorPatient'))){
    class ValidatorPatient extends Validator{
        public function destroi_sessao(){
            $sections = ['cpf', 'email', 'telefone', 'nascimento', 'nome', 'pid', 'deficiencia', 'senha', 'cep', 'emailexist', 'cpfexist'];
            foreach($sections as $section){
                if(isset($_SESSION[$section]) && $section == true){
                    unset($_SESSION[$section]);
                }
            }
            if(isset($_SESSION['patient'])){
                unset($_SESSION['patient']);
            }
            if(isset($_SESSION['address'])){
                unset($_SESSION['address']);
            }
        }
    }
}
?>
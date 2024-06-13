<?php
require_once __DIR__."/Validator.php";
require_once __DIR__."/../utils/autoload.php";
if(!(class_exists('ValidatorPatient'))){
    class ValidatorPatient extends Validator{
        public $controla_cpfpat;
        public function cpf_existpat(){
            if(isset($_SESSION['cpfpat']) && $_SESSION['cpfpat'] == true){
                $this->controla_cpfpat = 'color: red; display: block';
                return $this->controla_cpfpat;
            }else{
                $this->controla_cpfpat = 'color: red; display: none';
                return $this->controla_cpfpat;
            }
        }
    }
}
?>
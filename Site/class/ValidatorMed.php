<?php
require_once __DIR__."/Validator.php";
require_once __DIR__."/../utils/autoload.php";
if(!(class_exists('ValidatorMed'))){
    class ValidatorMed extends Validator{
        public $controla_crmexist;
        public $controla_crm;
        public function crm_valido(){
            if(isset($_SESSION['crm']) && $_SESSION['crm'] == true){
                $this->controla_crm = 'color: red; display: block';
                return $this->controla_crm;
            }else{
                $this->controla_crm = 'color: red; display: none';
                return $this->controla_crm;
            }
        }
        public function crmexist(){
            if(isset($_SESSION['crmexist']) && $_SESSION['crmexist'] == true){
                $this->controla_crmexist = 'color: red; display: block';
                return $this->controla_crmexist;
            }else{
                $this->controla_crmexist = 'color: red; display: none';
                return $this->controla_crmexist;
            }
        }
    }
}
?>
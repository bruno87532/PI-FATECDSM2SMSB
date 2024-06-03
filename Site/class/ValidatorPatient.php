<?php
require_once __DIR__."/Validator.php";
require_once __DIR__."/../utils/autoload.php";
if(!(class_exists('ValidatorPatient'))){
    class ValidatorPatient extends Validator{
    }
}
?>
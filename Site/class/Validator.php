<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";
if(!(class_exists('Validator'))){
    class Validator{
        
        public $controla_cpf;
        public $controla_email;
        public $controla_telefone;
        public $controla_nascimento;
        public $controla_nome;
        public $controla_pid;
        public $controla_deficiencia;
        public $controla_senha;
        public $controla_cep;
        public $controla_login;
        public $controla_logout;
        public $controla_emailexist;
        public $controla_cpfexist;
        public $controla_funcionario;

        public function cpf_valido(){
            if(isset($_SESSION['cpf']) && $_SESSION['cpf'] == true){
                $this->controla_cpf = 'color: red; display: block';
                return $this->controla_cpf;
            }else{
                $this->controla_cpf = 'color: red; display: none';
                return $this->controla_cpf;
            }
        }
        public function email_valido(){
            if(isset($_SESSION['email']) && $_SESSION['email'] == true){
                $this->controla_email = 'color: red; display: block';
                return $this->controla_email;
            }else{
                $this->controla_email = 'color: red; display: none';
                return $this->controla_email;
            }
        }
        public function telefone_valido(){
            if(isset($_SESSION['telefone']) && $_SESSION['telefone'] == true){
                $this->controla_telefone = 'color: red; display: block';
                return $this->controla_telefone;
            }else{
                $this->controla_telefone = 'color: red; display: none';
                return $this->controla_telefone;
            }
        }
        public function nascimento_valido(){
            if(isset($_SESSION['nascimento']) && $_SESSION['nascimento'] == true){
                $this->controla_nascimento = 'color: red; display: block';
                return $this->controla_nascimento;
            }else{
                $this->controla_nascimento = 'color: red; display: none';
                return $this->controla_nascimento;
            }
        }
        public function nome_valido(){
            if(isset($_SESSION['nome']) && $_SESSION['nome'] == true){
                $this->controla_nome = 'color: red; display: block';
                return $this->controla_nome;
            }else{
                $this->controla_nome = 'color: red; display: none';
                return $this->controla_nome;
            }
        }
        public function pid_valido(){
            if(isset($_SESSION['pid']) && $_SESSION['pid'] == true){
                $this->controla_pid = 'color: red; display: block';
                return $this->controla_pid;
            }else{
                $this->controla_pid = 'color: red; display: none';
                return $this->controla_pid;
            }
        }
        public function senha_valido(){
            if(isset($_SESSION['senha']) && $_SESSION['senha'] == true){
                $this->controla_senha = 'color: red; display: block';
                return $this->controla_senha;
            }else{
                $this->controla_senha = 'color: red; display: none';
                return $this->controla_senha;
            }
        }
        public function deficiencia_valido(){
            if(isset($_SESSION['deficiencia']) && $_SESSION['deficiencia'] == true){
                $this->controla_deficiencia = 'color: red; display: block';
                return $this->controla_deficiencia;
            }else{
                $this->controla_deficiencia = 'color: red; display: none';
                return $this->controla_deficiencia;
            }
        }
        public function cep_valido(){
            if(isset($_SESSION['cep']) && $_SESSION['cep'] == true){
                $this->controla_cep = 'color: red; display: block';
                return $this->controla_cep;
            }else{
                $this->controla_cep = 'color: red; display: none';
                return $this->controla_cep;
            }
        }
        public function emailexist(){
            if(isset($_SESSION['emailexist']) && $_SESSION['emailexist'] == true){
                $this->controla_emailexist = 'color: red; display: block';
                return $this->controla_emailexist;
            }else{
                $this->controla_emailexist = 'color: red; display: none';
                return $this->controla_emailexist;
            }
        }
        public function cpfexist(){
            if(isset($_SESSION['cpfexist']) && $_SESSION['cpfexist'] == true){
                $this->controla_cpfexist = 'color: red; display: block';
                return $this->controla_cpfexist;
            }else{
                $this->controla_cpfexist = 'color: red; display: none';
                return $this->controla_cpfexist;
            }
        }
        public function login(){
            if(isset($_SESSION['login'])){
                $this->controla_login = 'display: none';
                return $this->controla_login;
            }else{
                $this->controla_login = 'display: block';
                return $this->controla_login;
            }
        }
        public function logout(){
            if(isset($_SESSION['login'])){
                $this->controla_logout = 'display: block';
                return $this->controla_logout;
            }else{
                $this->controla_logout = 'display: none';
                return $this->controla_logout;
            }
        }
        public function employee(){
            if(isset($_SESSION['employee'])){
                $this->controla_funcionario = 'display: block';
                return $this->controla_funcionario;
            }else{
                $this->controla_funcionario = 'display: none';
                return $this->controla_funcionario;
            }
        }
        public function doctor(){
            if(isset($_SESSION['login_doctor'])){
                $this->controla_medico = 'display: block';
                return $this->controla_medico;
            }else{
                $this->controla_medico = 'display: none';
                return $this->controla_medico;
            }
        }
        public function destroi_sessao(){
            $sections = ['cpf', 'email', 'telefone', 'nascimento', 'nome', 'pid', 'deficiencia', 'senha', 'cep', 'emailexist', 'cpfexist', 'crm', 'crmexist', 'login_error'];
            foreach($sections as $section){
                if(isset($_SESSION[$section]) && $section == true){
                    unset($_SESSION[$section]);
                }
            }
            if(isset($_SESSION['patient'])){
                unset($_SESSION['patient']);
            }
            if(isset($_SESSION['doctor'])){
                unset($_SESSION['doctor']);
            }
            if(isset($_SESSION['address'])){
                unset($_SESSION['address']);
            }
        }
    }
}
?>
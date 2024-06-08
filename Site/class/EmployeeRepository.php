<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";

class EmployeeRepository extends Repository{
    public function SelecionaFuncionario($email, $password){
        $resultado = $this->selecionaUsuario('funcionarios', $email, $password);
        if($resultado['encontrado']){
            $loginEmployee = new Login();
            $dados = $resultado['resultado'];
            $loginEmployee->loginEmployee($dados['id'], $dados['nome']);
            return true;
        }else{
            $_SESSION['login_error'] = true;
            return false;
        }
    }
}   
?>
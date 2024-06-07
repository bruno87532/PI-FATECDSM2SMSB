<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";

class EmployeeRepository extends Repository{
    public function SelecionaFuncionario($email, $password){
        $pdo = $this->conexao->getConexao();
        $sql = "SELECT id, email, nome, senha FROM funcionarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            if($result['senha'] == $password){
                $loginEmployee = new Login();
                $loginEmployee->loginEmployee($result['id'], $result['nome']);
                return true;
            }else{
                $_SESSION['login_error'] = true;
                return false;
            }
        }
        else{
            $_SESSION['login_error'] = true;
            return false;
        }
    }
}   
?>
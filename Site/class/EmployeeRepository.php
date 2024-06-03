<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";

class EmployeeRepository{
    private $conexao;
    public function  __construct()
    {
        try 
        {
            $this->conexao = new Conexao();
        } 
        catch (Exception $e)
        {
            throw new Exception("Não foi possível conectar-se ao banco de dados: " . $e->getMessage());
        }
    }
    public function SelecionaFuncionario($email, $password){
        $pdo = $this->conexao->getConexao();
        $sqlF = "SELECT id, email, nome, senha FROM funcionarios WHERE email = :email";
        $stmtF = $pdo->prepare($sqlF);
        $stmtF->bindParam(':email', $email);
        $stmtF->execute();
        $resultF = $stmtF->fetch(PDO::FETCH_ASSOC);
        if($resultF){
            if($resultF['senha'] == $password){
                $loginEmployee = new Login();
                $loginEmployee->loginEmployee($resultF['id'], $resultF['nome']);
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
<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../models/conexao.php";

class LoginController extends RenderView {
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

    public function __destruct()
    {
        if ($this->conexao) {
            $this->conexao = null;
        }
    }

    public function index() {
        $this->loadView( 
            'login', []
        );
    }

    public function autenthication() {
        if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == true){
            unset($_SESSION['login_error']);
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pdo = $this->conexao->getConexao();
        $sql = "SELECT id, email, nome, senha FROM pacientes WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            if (password_verify($password, $result['senha'])) {
                $_SESSION['login'] = true;
                $_SESSION['login_id'] = $result['id'];
                $_SESSION['login_nome'] = $result['nome'];
                header("Location: ../../Site");
                exit();
            } else {
                $_SESSION['login_error'] = true;
                header("Location: ../login");
                exit();
            }
        } else {
            $_SESSION['login_error'] = true;
            header("Location: ../login");
            exit();
        }
    }
}
<?php

class Conexao {
    private $conexao;

    public function __construct() {
        $hostname = "localhost";
        $namebd = "clinica";
        $user = "root";
        $pass = "";

        try {
            $this->conexao = new PDO("mysql:host=$hostname;dbname=$namebd", $user, $pass);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // Lidar com o erro de conexão, se necessário
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function getConexao() {
        return $this->conexao;
    }
}

?>

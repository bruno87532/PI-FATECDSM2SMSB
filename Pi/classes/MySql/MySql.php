<?php
require_once('Dados.php');
class mysql
{
    public function __construct($servername, $dbname, $username, $password)
    {
        try
        {
            $conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $e)
        {
            echo "Conexão Falhada: " . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conexao = null; 
    }
}

?>

<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";
class Repository{
    protected $conexao;

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
    public function prepareInsert($campos, $tabela, $valores){
        try{
            $atributo = '';
            $valor = '';
            foreach($campos as $campo){
                $atributo .= $campo.', ';
                $valor .= ':'.$campo.', ';
            }
            $atributo = rtrim($atributo, ', ');
            $valor = rtrim($valor, ', ');
            $sql = 'INSERT INTO '.$tabela.' ('.$atributo.') VALUES ('.$valor.')';
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $x = 0;
            foreach($campos as $campo){
                $stmt->bindParam(':'.$campo, $valores[$x]);
                $x++;
            }
            $stmt->execute();
            return ($tabela == 'enderecos') ? $this->conexao->getConexao()->lastInsertId() : NULL;
        }catch(PDOException $e){
            throw new Exception("Erro ao inserir dados: ".$e->getMessage());
        }
    }
    public function selecionaCampo($campo, $tabela, $valor){
        try{
            $pdo = $this->conexao->getConexao();
            $sql = 'SELECT '.$campo.' FROM '.$tabela.' WHERE '.$campo.' = :'.$campo;
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':'.$campo, $valor);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($result) ? false : true;
        }catch(PDOException $e){
            throw new Exception("Erro ao consultar campo: ".$e->getMessage());
        }
    }
    public function selecionaCampos($campos, $tabelas, $campoValor, $valor){
        try{
            $pdo = $this->conexao->getConexao();
            $atributo = '';
            foreach($campos as $campo){
                $atributo .= $campo.', ';
            }
            $atributo = rtrim($atributo, ', ');
            $sql = 'SELECT '.$atributo.' FROM '.$tabelas.' WHERE '.$campoValor.' LIKE LOWER(:valor)';
            $valor = ($valor.'%');
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':valor', $valor);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            return $sql;
        }catch(PDOException $e){
            throw new Exception("Erro ao executar consuta ".$e->getMessage());
        }
    }
    public function selecionaTudo($sql){
        try{
            $pdo = $this->conexao->getConexao();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            throw new Exception("Erro ao executar consulta: ".$e->getMessage());
        }
    }
    public function selecionaUsuario($tabela, $email, $senha){
        try{
            $pdo = $this->conexao->getConexao();
            $sql = "SELECT id, email, nome, senha FROM ".$tabela." WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                if (password_verify($senha, $result['senha'])) {
                    $dados = ['exist' => true, 'dados' => $result];
                    return $dados;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }catch(PDOException $e){
            throw new Exception("Erro ao realizar login". $e->getMessage());
        }
    }
}
?>
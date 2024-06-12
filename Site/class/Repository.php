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

    public function executaConsulta($callback){
        try{
            return $callback();
        }catch(PDOException $e){
            throw new Exception("Erro ao executar consulta: ".$e->getMessage());
        }
    }

    public function prepareInsert($campos, $tabela, $valores){
        return $this->executaConsulta(function() use ($campos, $tabela, $valores){
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
        });
    }
    public function prepareUpdate($campos, $tabela, $valores, $id){
        return $this->executaConsulta(function() use ($campos, $tabela, $valores, $id){
            $update = '';
            $x = 0;
            foreach($campos as $campo){
                $update .= $campo.' = :'.$campo.', ';
            }   
            $update = rtrim($update, ', ');
            $sql = 'UPDATE '.$tabela.' SET '.$update.' WHERE id = :id';
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bindParam(':id', $id);
            foreach($campos as $campo){
                $stmt->bindParam(':'.$campo, $valores[$x]);
                $x++;
            } 
            $stmt->execute();
        });
    }
    public function selecionaCampo($campo, $tabela, $valor){
        return $this->executaConsulta(function() use ($campo, $tabela, $valor){
            $pdo = $this->conexao->getConexao();
            $sql = 'SELECT '.$campo.' FROM '.$tabela.' WHERE '.$campo.' = :'.$campo;
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':'.$campo, $valor);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($result) ? false : true;
        });
    }
    public function retornaConsulta($sql, $valores = NULL){
        return $this->executaConsulta(function() use ($sql, $valores){
            $pdo = $this->conexao->getConexao();
            $stmt = $pdo->prepare($sql);
            if($valores != NULL){
                foreach($valores as $campo => $valor){
                    $stmt->bindValue($campo, $valor);
                }
            }
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        });
    }
    public function selecionaUsuario($tabela, $email, $senha){
        return $this->executaConsulta(function() use ($tabela, $email, $senha){
            $pdo = $this->conexao->getConexao();
            $sql = "SELECT id, email, nome, senha FROM ".$tabela." WHERE BINARY email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                if (password_verify($senha, $result['senha'])) {
                    $dados = ['encontrado' => true, 'resultado' => $result];
                    return $dados;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        });
    }
}
?>
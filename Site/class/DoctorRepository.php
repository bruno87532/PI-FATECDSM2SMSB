<?php

require_once __DIR__."/../utils/autoload.php";

class DoctorRepository extends Repository
{
    public function getById($id)
    {
        try
        {
            $sql = "SELECT * FROM medicos WHERE id = :id";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if($resultado)
            {
                $doctor = new Doctor();
                $doctor->setId($resultado['id']);
                $doctor->setNome($resultado['nome']);
                

                return $doctor;
            }
            else
            {
                return null; 
            }
        }
        catch (PDOException $e)
        {
            throw new Exception("Erro ao selecionar médico: ".$e->getMessage());
        }
    }
    public function SelecionaMedico($email, $password){
        if($this->selecionaUsuario('medicos', $email, $password)){
            $loginDoctor = new Login();
            $loginDoctor->loginDoctor($result['id'], $result['nome']);
            return true;
        }else{
            $_SESSION['login_error'] = true;
            return false;
        }
    }
    public function SelecionaEmail($email)
    {
        return $this->selecionaCampo('email', 'medicos', $email);
    }

    public function SelecionaCrm($crm)
    {
        return $this->selecionaCampo('crm', 'medicos', $crm);
    }

    public function SelecionaCPF($cpf)
    {
        return $this->selecionaCampo('cpf', 'medicos', $cpf);
    }
    public function CreateEndereco(Address $endereco)
    {
        $cep = $endereco->getCep();
        $estado = $endereco->getEstado();
        $cidade = $endereco->getCidade();
        $bairro = $endereco->getBairro();
        $rua = $endereco->getRua();
        $numero = $endereco->getNumero();
        $complemento = $endereco->getComplemento();
        $array_campos = ['cep', 'estado', 'cidade', 'bairro', 'rua', 'numeroCasa', 'complemento'];
        $array_valores = [$cep, $estado, $cidade, $bairro, $rua, $numero, $complemento];
        $id = $this->prepareInsert($array_campos, 'enderecos', $array_valores);
        return $id;
    }

    public function CreateDoctor(Doctor $doctor, $ide, $idf)
    {
        $nome = $doctor->getNome();
        $cpf = $doctor->getCpf();
        $nascimento = $doctor->getNascimento();
        $telefone = $doctor->getTelefone();
        $crm = $doctor->getCrm();
        $disponibilidadeInicio = $doctor->getDisponibilidadeInicio();
        $disponibilidadeFim = $doctor->getDisponibilidadeFim();
        $especialidade = $doctor->getEspecialidade();
        $email = $doctor->getEmail();
        $genero = $doctor->getGenero();
        $senha = $doctor->getSenha();
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $array_campos = ['nome', 'cpf', 'nascimento', 'telefone', 'crm', 'disponibilidadeInicio', 'disponibilidadeFim', 'especialidade', 'email', 'genero', 'senha', 'id_endereco', 'id_funcionario'];
        $array_valores = [$nome, $cpf, $nascimento, $telefone, $crm, $disponibilidadeInicio, $disponibilidadeFim, $especialidade, $email, $genero, $hash, $ide, $idf];
        $this->prepareInsert($array_campos, 'medicos', $array_valores);
    }
    
}

?>

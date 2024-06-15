<?php

require_once __DIR__."/../utils/autoload.php";

class DoctorRepository extends Repository
{
    public function getByEspecialidade($especialidade)
    {
        try {
            $sql = "SELECT * FROM medicos WHERE especialidade = :especialidade";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bindParam(':especialidade', $especialidade);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $medicos = [];

            foreach ($resultados as $resultado) {
                $doctor = new Doctor();
                $doctor->setId($resultado['id']);
                $doctor->setNome($resultado['nome']);
                $doctor->setEspecialidade($resultado['especialidade']);
                $doctor->setDisponibilidadeInicio($resultado['disponibilidadeInicio']);
                $doctor->setDisponibilidadeFim($resultado['disponibilidadeFim']);
                $medicos[] = $doctor;
            }

            return $medicos;
        } catch (PDOException $e) {
            throw new Exception("Erro ao selecionar médico: " . $e->getMessage());
        }
    }
    public function getHorarios($medico, $data){
        $array_valores = [':id' => $medico];
        $sql = "SELECT disponibilidadeInicio, disponibilidadeFim FROM medicos WHERE id = :id";
        $resultado = $this->retornaConsulta($sql, $array_valores);
        $array_valores = [':horaInicio' => $resultado[0]['disponibilidadeInicio'], ':horaFim' => $resultado[0]['disponibilidadeFim'], ':id' => $medico]; 
        $sql = "CALL CalculaIntervalos(:horaInicio, :horaFim, :id)";
        $this->retornaConsulta($sql, $array_valores);
        $array_valores = [':data' => $data];
        $sql = "SELECT h.horario FROM horariosmedicos h LEFT JOIN medicos m ON m.id = h.idMedico LEFT JOIN consultas c ON h.idMedico = c.id_medico AND h.horario = c.horarioInicio AND c.dataC = :data
        WHERE c.id_medico IS NULL AND h.horario <> m.disponibilidadeFim ORDER BY h.horario";
        $resultado = $this->retornaConsulta($sql, $array_valores);
        $resultado = array_values($resultado);
        $retornaResultado = [];
        foreach($resultado as $result){
            $retornaResultado[] = $result['horario'];
        }
        return $retornaResultado;
    }
    public function SelecionaMedico($email, $password){
        $resultado = $this->selecionaUsuario('medicos', $email, $password);
        if($resultado['encontrado']){
            $loginDoctor = new Login();
            $dados = $resultado['resultado'];
            $loginDoctor->loginDoctor($dados['id'], $dados['nome']);
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
        if(isset($endereco->complemento)){
            $complemento = $endereco->getComplemento();
        }
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

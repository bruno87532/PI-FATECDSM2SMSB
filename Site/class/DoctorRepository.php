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
        $array_valores = [':nome' => $medico]; 
        $sql = 'SELECT disponibilidadeInicio, disponibilidadeFim FROM medicos WHERE id = :nome';
        $resultado = $this->retornaConsulta($sql, $array_valores);
        $horaInicio = new DateTime($resultado[0]['disponibilidadeInicio']);
        $horaFim = new DateTime($resultado[0]['disponibilidadeFim']);
        $horariosConsulta = [];
        while($horaInicio <= $horaFim){
            $horariosConsulta[] = $horaInicio->format("H:i");
            $horaInicio->modify('+30 minutes');
        }
        $horariosConsulta = array_values($horariosConsulta);
        array_pop($horariosConsulta);
        $array_valores = [':dataC' => $data, ':nome' => $medico];
        $sql = 'SELECT c.horarioInicio FROM consultas c INNER JOIN medicos m ON m.id = c.id_medico WHERE dataC = :dataC and m.id = :nome';
        $resultado = $this->retornaConsulta($sql, $array_valores);
        $resultado = array_values($resultado);
        $resultadoFormatado = [];
        foreach($resultado as $result){
            $resultadoFormatado[] = (new DateTime($result['horarioInicio']))->format('H:i');
        }
        $horariosDisponiveis = array_diff($horariosConsulta, $resultadoFormatado);
        $horariosDisponiveis = array_values($horariosDisponiveis);
        return $horariosDisponiveis;
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

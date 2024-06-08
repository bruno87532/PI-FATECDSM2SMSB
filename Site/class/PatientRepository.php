<?php
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../utils/autoload.php";

class PatientRepository extends Repository
{
    public function SelecionaPaciente($email, $password)
    {
        $resultado = $this->selecionaUsuario('pacientes', $email, $password);
        if($resultado['encontrado']){
            $loginPatient = new Login();
            $dados = $resultado['resultado'];
            $loginPatient->loginPatient($dados['id'], $dados['nome']);
            return true;
        }else{
            $_SESSION['login_error'] = true;
            return false;
        }
    }
    public function SelecionaEmail($email)
    {
        return $this->selecionaCampo('email', 'pacientes', $email);
    }

    public function SelecionaCPF($cpf)
    {
        return $this->selecionaCampo('cpf', 'pacientes', $cpf);
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

    public function CreatePaciente(Patient $patient, $id)
    {
        $nome = $patient->getNome();
        $cpf = $patient->getCpf();
        $nascimento = $patient->getNascimento();
        $telefone = $patient->getTelefone();
        $email = $patient->getEmail();
        if(isset($patient->necessidadeEspecial) && $patient->necessidadeEspecial == 1){
            $necessidadeEspecial = $patient->getNecessidadeEspecial();
            $necessidade = $patient->getNecessidade();
        }else{
            $necessidadeEspecial = NULL;
            $necessidade = NULL;
        }
        if(isset($patient->idoso) && $patient->idoso == 1){
                $idoso = $patient->getIdoso();
        }else{
            $idoso = NULL;
        }
        $genero = $patient->getGenero();
        $senha = $patient->getSenha();
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $array_campos = ['nome', 'cpf', 'nascimento', 'telefone', 'email', 'necessidadeEspecial', 'necessidadeTipo', 'idoso', 'genero', 'id_endereco', 'senha'];
        $array_valores = [$nome, $cpf, $nascimento, $telefone, $email, $necessidadeEspecial, $necessidade, $idoso, $genero, $id, $hash];
        $this->prepareInsert($array_campos, 'pacientes', $array_valores);
    }
}
?>
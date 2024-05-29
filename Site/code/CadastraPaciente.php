<?php

require_once("funcoes.php");
require_once("validadora.php");
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/paciente.php");
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/endereco.php");


   $validacao = new Validador();
   $validacao->destroi_sessao();

   $camposObrigatorios = array(
       "nome",
       "cpf",
       "email",
       "telefone",
       "data_nascimento",
       "cep",
       "estado",
       "cidade",
       "bairro",
       "rua",
       "numero_casa",
       "sexo"
   );
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
       foreach($camposObrigatorios as $campos)
       {
            if(empty($_POST[$campos]))
            {
                exit();
            }
       }
       
       if(isset($_POST["pcd"])){
            if(empty($_POST["deficiencia"])){
                exit();
            }
       }
       $validador = new Funcionalidade();
       $boolTesteNome = $validador->validaNome($_POST["nome"]);
       if(!$boolTesteNome){
            $_SESSION["nome"] = true;
            header("Location: ../Cadastre-se.php");
            exit();
       }
       
       $boolTesteCpf = $validador->validaCpf($_POST["cpf"]);
       if(!$boolTesteCpf){
            $_SESSION["cpf"] = true;
            header("Location: ../Cadastre-se.php");
            exit();
       }
       
       $boolTesteTelefone = $validador->validaTelefone($_POST["telefone"]);
       if(!$boolTesteTelefone){
            $_SESSION["telefone"] = true;
            header("Location: ../Cadastre-se.php");
            exit();
       }
       
       $boolTesteNascimento = $validador->validaNascimento($_POST["nascimento"]);
       if(!$boolTesteNascimento){
            $_SESSION["nascimento"] = true;
            header("Location: ../Cadastre-se.php");
            exit();
       }        
           $paciente = new Paciente();
           $paciente->setNome($_POST["nome"]);
           $paciente->setCpf($_POST["cpf"]);
           $paciente->setEmail($_POST["email"]);
           $paciente->setTelefone($_POST["telefone"]);
           $paciente->setNascimento($_POST["data_nascimento"]);
           $sexo = ($_POST["sexo"] == "masculino") ? "M" : "F";
           $paciente->setGenero($sexo);
           if(isset($_POST["pcd"]))
           {
                $pcd = 1;
                $paciente->setNecessidadeEspecial($pcd);
                $paciente->setNecessidade($_POST["deficiencia"]);
           }
           else{
                $pcd = 0;
                $paciente->setNecessidadeEspecial($pcd);
                $necessidade = "Não é PCD";
                $paciente->setNecessidade($necessidade);
           }
           if(isset($_POST["idoso"]))
           {
                $idoso = 1;
                $paciente->setIdoso($idoso);
           }
           else
           {
                $idoso = 2;
                $paciente->setIdoso($idoso);
           }
           $endereco = new Endereco();
           $endereco->setCep($_POST["cep"]);
           $endereco->setEstado($_POST["estado"]);
           $endereco->setCidade($_POST["cidade"]);
           $endereco->setBairro($_POST["bairro"]);
           $endereco->setRua($_POST["rua"]);
           $endereco->setNumero($_POST["numero_casa"]);
           if($_POST["complemento"] != "")
           {
               $endereco->complemento = $_POST["complemento"];
           }
           try {
                $pacienteRepository = new PacienteRepository();
                $pacienteRepository->createPaciente($paciente);
                
           } catch (Exception $e) {
               echo "Erro ao cadastrar paciente: " . $e->getMessage();
           }
   } else {
       echo "Todos os campos do formulário devem ser preenchidos.";
   }
   header("Location:../login.html");


?>
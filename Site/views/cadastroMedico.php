<?php
require_once __DIR__."/../utils/autoload.php";

if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
$ValidatorMCad = new  ValidatorMed();
$estilocpfm = $ValidatorMCad->cpf_valido();
$estiloemailm = $ValidatorMCad->email_valido();
$estilotelefonem = $ValidatorMCad->telefone_valido();
$estilonascimentom = $ValidatorMCad->nascimento_valido();
$estilonomem = $ValidatorMCad->nome_valido();
$estilosenham = $ValidatorMCad->senha_valido();
$estilocpfexistm = $ValidatorMCad->cpfexist();
$estiloemailexistm = $ValidatorMCad->emailexist();
$estilocrm = $ValidatorMCad->crm_valido();
$estilocrmexist = $ValidatorMCad->crmexist();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cadastro</title>
    <style>
    </style>
</head>
<body>
    <div class="imgfundocadastro">
    <div class="container-cadastroMedico">
        <h2>Cadastro Médico</h2><br>
        <form class="formulario-cadastroMedico" method="POST" action="proximomed/validador">
            <label for="nomem">Nome:</label>
            <input type="text" id="nomem" name="nomem" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getNome() : ""; ?>" required><br>
            <p style="<?php echo $estilonomem?>">Nome inválido!</p>
        
            <label for="cpfm">CPF:</label>
            <input type="text" id="cpfm" name="cpfm" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getCpf() : ""; ?>" required><br>
            <p style="<?php echo $estilocpfm?>">CPF inválido!</p>
            <p style="<?php echo $estilocpfexistm ?>">Já existe um usuário com este CPF</p>

            <label for="emailm">E-mail:</label>
            <input type="email" id="emailm" name="emailm" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getEmail() : ""; ?>" required><br>
            <p style="<?php echo $estiloemailexistm ?>">Já existe um usuário com este email</p>

            <label for="senham">Senha:</label>
            <input type="password" id="senham" name="senham" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getSenha() : ""; ?>" required><br>
            <p style="<?php echo $estilosenham?>">A senha deve ter pelo menos oito caracteres!</p>
        
            <label for="telefonem">Telefone:</label>
            <input type="tel" id="telefonem" name="telefonem" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getTelefone() : ""; ?>" required><br>
            <p style="<?php echo $estilotelefonem ?>">Telefone inválido!</p>

            <label for="data_nascimentom">Data de Nascimento:</label>
            <input type="date" id="data_nascimentom" name="data_nascimentom" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getNascimento() : ""; ?>" required><br>
            <p style="<?php echo $estilonascimentom?>">Data de nascimento inválida!</p> 
        
            <label for="sexom">Sexo:</label>
            <select id="sexom" name="sexom" required>
                <?php
                    $generos = ["Masculino", "Feminino", "Outro"];
                    foreach($generos as $genero){
                        if(isset($_SESSION['doctor']) && $_SESSION['doctor']->getGenero() == $genero){
                            echo '<option selected value="'.$genero.'">'.$genero.'</option>';
                        }else{
                            echo '<option value="'.$genero.'">'.$genero.'</option>';
                        }
                    }
                ?>
            </select><br>
        
            <label for="crm">CRM:</label>
            <input type="text" id="crm" name="crm" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getCrm() : ""; ?>" required><br>
            <p style="<?php echo $estilocrm ?>">CRM inválido!</p>
            <p style="<?php echo $estilocrmexist ?>">Já existe um médico com este CRM!</p>
        
            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="especialidade" required>
                <option value="#">.......</option>
                <?php
                $especialidades = ["Cardiologia", "Ginecologia", "Dermatologia", "Oftalmologia", "Nutricionista", "Fisioterapia", "Traumatologia", "Infectologia"];
                foreach($especialidades as $especialidade){
                    if(isset($_SESSION["doctor"]) && $_SESSION["doctor"]->getEspecialidade() == $especialidade){
                        echo '<option selected value ="'.$especialidade.'">'.$especialidade.'</option>';
                    }else{
                        echo '<option value ="'.$especialidade.'">'.$especialidade.'</option>';
                    }
                }
                ?>
            </select>
        
            <label for="disponibilidadeInicio">Disponibilidade de Início:</label>
            <input type="time" id="disponibilidadeInicio" name="disponibilidadeInicio" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getDisponibilidadeInicio() : ""; ?>" required><br>
        
            <label for="disponibilidadeFim">Disponibilidade de Fim:</label>
            <input type="time" id="disponibilidadeFim" name="disponibilidadeFim" value="<?php echo isset($_SESSION["doctor"]) ? $_SESSION["doctor"]->getDisponibilidadeFim() : ""; ?>" required><br>
            
            <div class="btn-cadastro">
                <input type="submit" class="btn-proximo" value="Próximo">
            </div>
        </form>
    </div>
</div>


</body>
</html>
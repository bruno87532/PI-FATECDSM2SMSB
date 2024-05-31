<?php
require_once __DIR__."/../class/Address.php";
require_once __DIR__."/../class/Patient.php";
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
require_once __DIR__."/../class/Validator.php";
$pcd = (isset($_SESSION["patient"]) && $_SESSION["patient"]->getNecessidadeEspecial() == 1) ? 1 : 0; 
$idoso = (isset($_SESSION["patient"]) && $_SESSION["patient"]->getIdoso() == 1) ? 1 : 0; 
$ValidatorHCad = new  Validator();
$estilocpf = $ValidatorHCad->cpf_valido();
$estiloemail = $ValidatorHCad->email_valido();
$estilotelefone = $ValidatorHCad->telefone_valido();
$estilonascimento = $ValidatorHCad->nascimento_valido();
$estilonome = $ValidatorHCad->nome_valido();
$estilopid = $ValidatorHCad->pid_valido();
$estilodeficiencia = $ValidatorHCad->deficiencia_valido();
$estilosenha = $ValidatorHCad->senha_valido();
// $ValidatorHCad->destroi_sessao();
?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <div class="container-cadastro">
        <h2>Cadastre-se</h2><br>
        <form class="formulario-cadastro" method="POST" action="proximo/validador">
            <div class="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required value="<?php echo isset($_SESSION["patient"]) ? $_SESSION["patient"]->getNome() : ""; ?>">
                <p style="<?php echo $estilonome?>">Nome inválido!</p>
            </div>
            <div>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required value="<?php echo isset($_SESSION["patient"]) ? $_SESSION["patient"]->getCpf() : ""; ?>">
                <p style="<?php echo $estilocpf?>">CPF inválido!</p>    
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($_SESSION["patient"]) ? $_SESSION["patient"]->getEmail() : ""; ?>">
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required value="<?php echo isset($_SESSION["patient"]) ? $_SESSION["patient"]->getSenha() : ""; ?>">
                <p style="<?php echo $estilosenha?>">A senha deve ter pelo menos oito caracteres!</p>
            </div>
            <div>
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required value="<?php echo isset($_SESSION["patient"]) ? $_SESSION["patient"]->getTelefone() : ""; ?>">
                <p style="<?php echo $estilotelefone ?>">Telefone inválido!</p>
            </div>
            <div>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required value="<?php echo isset($_SESSION["patient"]) ? $_SESSION["patient"]->getNascimento() : ""; ?>">     
                <p style="<?php echo $estilonascimento?>">Data de nascimento inválida!</p>           
            </div>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <?php
                    $generos = ["Masculino", "Feminino", "Outro"];
                    foreach($generos as $genero){
                        if(isset($_SESSION['patient']) && $_SESSION['patient']->getGenero() == $genero){
                            echo '<option selected value="'.$genero.'">'.$genero.'</option>';
                        }else{
                            echo '<option value="'.$genero.'">'.$genero.'</option>';
                        }
                    }
                ?> 
            </select>
            <div class="checkbox-group">
                <input type="checkbox" id="pcd" name="pcd" <?php if($pcd == 1) echo "checked" ?>>
                <label for="pcd">Sou PCD</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="idoso" name="idoso" <?php if($idoso == 1) echo "checked" ?>>
                <label for="idoso">Sou Idoso</label>
            </div>
            <p style="<?php echo $estilopid?>">A clínica é especializa para idoso e PCD.</p>
            <div id="areaDeficiencia" style="display: none;">
                <label for="deficiencia">Tipo de Deficiência:</label>
                <input type="text" id="deficiencia" name="deficiencia" value="<?php if((isset($_SESSION["patient"]) && $_SESSION["patient"]->getNecessidadeEspecial() == 1)) echo $_SESSION["patient"]->getNecessidade()?>">
                <p style="<?php echo $estilodeficiencia?>">O campo não pode ser vazio.</p>
            </div>
            <div class="btn-cadastro">
                <input type="submit" class="btn-proximo" value="Próximo">
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>
   function verificarChecked() {
        var pcdChecked = document.getElementById('pcd');
        var areaDeficiencia = document.getElementById('areaDeficiencia');
       areaDeficiencia.style.display = pcdChecked.checked ? 'block' : 'none';
    }
    verificarChecked();
    document.getElementById('pcd').addEventListener('click', function() {
        var areaDeficiencia = document.getElementById('areaDeficiencia');
        areaDeficiencia.style.display = this.checked ? 'block' : 'none';
    });
</script>
<?php
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/paciente.php");
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/endereco.php");
session_start();
require_once("C:/xampp/htdocs/PI-FATECDSM2SMSB/Site/classes/validadora.php");
$pcd = (isset($_SESSION["paciente"]) && $_SESSION["paciente"]->necessidadeEspecial == 1) ? 1 : 0; 
$idoso = (isset($_SESSION["paciente"]) && $_SESSION["paciente"]->idoso == 1) ? 1 : 0; 
$valida = new Validador();
$estilocpf = $valida->cpf_valido();
$estiloemail = $valida->email_valido();
$estilotelefone = $valida->telefone_valido();
$estilonascimento = $valida->nascimento_valido();
$estilonome = $valida->nome_valido();
$estilopid = $valida->pid_valido();
$estilodeficiencia = $valida->deficiencia_valido();
$estilosenha = $valida->senha_valido();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
        <form class="formulario-cadastro" method="POST" action="proximo.php">
            <label for="nome">Nome:</label>
            <p style="<?php echo $estilonome?>">Nome inválido!</p>
            <input type="text" id="nome" name="nome" required value="<?php echo isset($_SESSION["paciente"]) ? $_SESSION["paciente"]->getNome() : ""; ?>">
            <label for="cpf">CPF:</label>
            <p style="<?php echo $estilocpf?>">CPF inválido!</p>
            <input type="text" id="cpf" name="cpf" required value="<?php echo isset($_SESSION["paciente"]) ? $_SESSION["paciente"]->getCpf() : ""; ?>">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required value="<?php echo isset($_SESSION["paciente"]) ? $_SESSION["paciente"]->getEmail() : ""; ?>">
            <label for="senha">Senha:</label>
            <p style="<?php echo $estilosenha?>">A senha deve ter pelo menos oito caracteres!</p>
            <input type="password" id="senha" name="senha" required value="<?php echo isset($_SESSION["paciente"]) ? $_SESSION["paciente"]->getSenha() : ""; ?>">
            <label for="telefone">Telefone:</label>
            <p style="<?php echo $estilotelefone ?>">Telefone inválido!</p>
            <input type="tel" id="telefone" name="telefone" required value="<?php echo isset($_SESSION["paciente"]) ? $_SESSION["paciente"]->getTelefone() : ""; ?>">
            <label for="data_nascimento">Data de Nascimento:</label>
            <p style="<?php echo $estilonascimento?>">Data de nascimento inválida!</p>
            <input type="date" id="data_nascimento" name="data_nascimento" required value="<?php echo isset($_SESSION["paciente"]) ? $_SESSION["paciente"]->getNascimento() : ""; ?>">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <?php
                    $generos = ["Masculino", "Feminino", "Outro"];
                    foreach($generos as $genero){
                        echo '<option value="'.$genero.'">'.$genero.'</option>';
                    }
                    if(isset($_SESSION["paciente"])){
                        echo '<option selected value="'.$_SESSION["paciente"]->getGenero().'">'.$_SESSION["paciente"]->getGenero().'</option>';
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
                <input type="text" id="deficiencia" name="deficiencia" value="<?php echo (isset($_SESSION["paciente"]) && $_SESSION["paciente"]->necessidade != NULL) ? $_SESSION["paciente"]->getNecessidade() : ""; ?>">
                <p style="<?php echo $estilodeficiencia?>">O campo não pode ser vazio.</p>
            </div>
            <div class="btn-cadastro">
                <input type="submit" class="btn-proximo" value="Próximo">
            </div>
        </form>
    </div>
</div>

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
</body>
</html>
<?php
$valida->destroi_sessao();
if(isset($_SESSION["paciente"])){
    unset($_SESSION["paciente"]);
}
?>
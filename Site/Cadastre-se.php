<?php
require_once("classes/validadora.php");
$validacao = new valida_cadastro();
$estilocpf = $validacao->cpf_valido();
$estiloemail = $validacao->email_valido();
$estilotelefone = $validacao->telefone_valido();
$estilonascimento = $validacao->nascimento_valido();
$estilonome = $validacao->nome_valido();
?>
<!DOCTYPE html>
<html lang="en">
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
        <form class="formulario-cadastro" action="proximo.php" method="POST">
            <label for="nome">Nome:</label>
            <p style="<?php echo $estilonome?>">Nome inválido!</p>
            <input type="text" id="nome" name="nome" required value="<?php echo isset($retornoPaciente->nome) ? $retornoPaciente->getNome() : ""; ?>">
            <label for="cpf">CPF:</label>
            <p style="<?php echo $estilocpf?>">CPF não existe!</p>
            <input type="text" id="cpf" name="cpf" required value="<?php echo isset($retornoPaciente->cpf) ? $retornoPaciente->getCpf() : ""; ?>">
            <label for="email">E-mail:</label>
            <p style="<?php echo $estiloemail?>">Campo inválido!</p>
            <input type="email" id="email" name="email" required value="<?php echo isset($retornoPaciente->email) ? $retornoPaciente->getEmail() : ""; ?>">
            <label for="telefone">Telefone:</label>
            <p style="<?php echo $estilotelefone ?>">Telefone inválido!</p>
            <input type="tel" id="telefone" name="telefone" required value="<?php echo isset($retornoPaciente->telefone) ? $retornoPaciente->getTelefone() : ""; ?>">
            <label for="data_nascimento">Data de Nascimento:</label>
            <p style="<?php echo $estilonascimento?>">Data de nascimento inválida!</p>
            <input type="date" id="data_nascimento" name="data_nascimento" required value="<?php echo isset($retornoPaciente->nascimento) ? $retornoPaciente->getNascimento() : ""; ?>">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
            </select>
            <div class="checkbox-group">
                <input type="checkbox" id="pcd" name="pcd" value="<?php echo isset($retornoPaciente->necessidadeEspecial) ? 1 : 0 ?>">
                <label for="pcd">Sou PCD</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="idoso" name="idoso" value="<?php echo isset($retornoPaciente->idoso) ? 1 : 0 ?>">
                <label for="idoso">Sou Idoso</label>
            </div>
            <div id="areaDeficiencia" style="display: none;">
                <label for="deficiencia">Tipo de Deficiência:</label>
                <input type="text" id="deficiencia" name="deficiencia" value="<?php echo isset($retornoPaciente->necessidade) ? $retornoPaciente->getNecessidade() : ""; ?>">
            </div>
            <div class="btn-cadastro">
                <input type="submit" class="btn-proximo" value="Próximo">
            </div>
        </form>
    </div>
</div>

<script>
    // Adicione um evento de clique ao checkbox "Sou PCD"
    document.getElementById('pcd').addEventListener('click', function() {
        var areaDeficiencia = document.getElementById('areaDeficiencia');
        areaDeficiencia.style.display = this.checked ? 'block' : 'none';
    });
</script>
</body>
</html>

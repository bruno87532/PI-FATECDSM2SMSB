<?php
$estilocpf = "color: red; display: none";
$estiloemail = "color: red; display: none";
$estilotelefone = "color: red; display: none";
$estilonascimento = "color: red; display: none";
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
        <form class="formulario-cadastro" method="POST" action="proximo.php">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="cpf">CPF:</label>
            <p style="<?php echo $estilocpf?>">Campo inválido!</p>
            <input type="text" id="cpf" name="cpf" required>
            <label for="email">E-mail:</label>
            <p style="<?php echo $estiloemail?>">Campo inválido!</p>
            <input type="email" id="email" name="email" required>
            <label for="telefone">Telefone:</label>
            <p style="<?php echo $estilotelefone ?>">Campo inválido!</p>
            <input type="tel" id="telefone" name="telefone" required>
            <label for="data_nascimento">Data de Nascimento:</label>
            <p style="<?php echo $estilonascimento?>">Campo inválido!</p>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
            </select>
            <div class="checkbox-group">
                <input type="checkbox" id="pcd" name="pcd">
                <label for="pcd">Sou PCD</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="idoso" name="idoso">
                <label for="idoso">Sou Idoso</label>
            </div>
            <div id="areaDeficiencia" style="display: none;">
                <label for="deficiencia">Tipo de Deficiência:</label>
                <input type="text" id="deficiencia" name="deficiencia" >
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

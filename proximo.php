<?php
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$data_nascimento = $_POST["data_nascimento"];
$sexo = $_POST["sexo"];
$pcd = $_POST["pcd"];
$idoso = $_POST["idoso"];
$deficiencia = $_POST["deficiencia"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="imgfundocadastro">
        <div class="container-cadastro">
            <h2>Cadastre-se</h2>
            <form class="formulario-cadastro" id="form" action="code/confirmaCadastro.php" method="POST">
                <input type="hidden" name="nome" value="<?php echo $_POST["nome"] ?>">
                <input type="hidden" name="cpf" value="<?php echo $_POST["cpf"]?>">
                <input type="hidden" name="email" value="<?php echo $_POST["email"]?>">
                <input type="hidden" name="telefone" value="<?php echo $_POST["telefone"]?>">
                <input type="hidden" name="data_nascimento" value="<?php echo $_POST["data_nascimento"]?>"> 
                <input type="hidden" name="sexo" value="<?php echo $_POST["sexo"]?>">
                <input type="hidden" name="idoso" value="<?php echo $_POST["idoso"]?>">
                <input type="hidden" name="deficiencia" value="<?php echo $_POST["deficiencia"]?>">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required>
                
                <label for="numero_casa">Nº:</label>
                <input type="text" id="numero_casa" name="numero_casa" required>
                
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" required>
                
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" required>
                
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required>
                
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required>
                
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="" disabled selected>Selecione um estado</option>
                </select>
                <input type="submit" value="Cadastrar" class="btn-proximo">
            </form>

            <div class="btn">
                <a href="Cadastre-se.html" ><button class="btn-proximo">Voltar</button></a>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const estados = [
            "Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará", "Distrito Federal",
            "Espírito Santo", "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul", "Minas Gerais",
            "Pará", "Paraíba", "Paraná", "Pernambuco", "Piauí", "Rio de Janeiro", "Rio Grande do Norte",
            "Rio Grande do Sul", "Rondônia", "Roraima", "Santa Catarina", "São Paulo", "Sergipe", "Tocantins"
        ];

        const selectEstado = document.getElementById('estado');
        
        estados.forEach(estado => {
            const option = document.createElement('option');
            option.text = estado;
            option.value = estado;
            selectEstado.add(option);
        });
    </script>
</body>
</html>

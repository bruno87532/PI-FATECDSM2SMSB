<?php
require_once __DIR__."/../class/Patient.php";
require_once __DIR__."/../class/Address.php";
session_start();
if(isset($_POST["pcd"])){
    $pcd = $_POST["pcd"];
}
if(isset($_POST["idoso"])){
    $idoso = $_POST["idoso"];
}
$deficiencia = $_POST["deficiencia"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/styles/style.css">
</head>
<body>
    <div class="imgfundocadastro">
        <div class="container-cadastro">
            <h2>Cadastre-se</h2>
            <form class="formulario-cadastro" id="form" action="code/confirmaCadastro.php" method="POST">
                <input type="hidden" name="nome" value="<?php echo $_POST["nome"] ?>">
                <input type="hidden" name="cpf" value="<?php echo $_POST["cpf"]?>">
                <input type="hidden" name="email" value="<?php echo $_POST["email"]?>">
                <input type="hidden" name="senha" value="<?php echo $_POST["senha"]?>">
                <input type="hidden" name="telefone" value="<?php echo $_POST["telefone"]?>">
                <input type="hidden" name="data_nascimento" value="<?php echo $_POST["data_nascimento"]?>"> 
                <input type="hidden" name="sexo" value="<?php echo $_POST["sexo"]?>">
                <input type="hidden" name="idoso" value="<?php echo isset($_POST["idoso"]) ? 1 : 0?>">
                <input type="hidden" name="pcd" value="<?php echo isset($_POST["pcd"]) ? 1 : 0?>">
                <input type="hidden" name="deficiencia" value="<?php echo isset($_POST["pcd"]) ? $_POST["deficiencia"] : ""; ?>">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required value="<?php echo isset($_SESSION["endereco"]) ? $_SESSION["endereco"]->getCidade() : ""; ?>">
                
                <label for="numero_casa">Nº:</label>
                <input type="text" id="numero_casa" name="numero_casa" required value="<?php echo isset($_SESSION["endereco"]) ? $_SESSION["endereco"]->getNumero() : ""; ?>">
                
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" required value="<?php echo isset($_SESSION["endereco"]) ? $_SESSION["endereco"]->getRua() : ""; ?>">
                
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" value="<?php echo isset($_SESSION["endereco"]) ? $_SESSION["endereco"]->getComplemento() : ""; ?>">
                
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required value="<?php echo isset($_SESSION["endereco"]) ? $_SESSION["endereco"]->getCep() : ""; ?>"> 
                
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required value="<?php echo isset($_SESSION["endereco"]) ? $_SESSION["endereco"]->getBairro() : ""; ?>">
                
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option disabled selected>Selecione um estado</option>
                    <?php
                        $estados = [
                            "Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará", "Distrito Federal",
                            "Espírito Santo", "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul", "Minas Gerais",
                            "Pará", "Paraíba", "Paraná", "Pernambuco", "Piauí", "Rio de Janeiro", "Rio Grande do Norte",
                            "Rio Grande do Sul", "Rondônia", "Roraima", "Santa Catarina", "São Paulo", "Sergipe", "Tocantins"
                        ];
                        foreach($estados as $estado){
                            echo '<option value="'.$estado.'">'.$estado.'</option>';
                        }
                        if(isset($_SESSION["endereco"])){
                            echo '<option selected value="'.$_SESSION["endereco"]->getEstado().'">'.$_SESSION["endereco"]->getEstado().'</option>';
                        }
                    ?>
                </select>
                <input type="submit" value="Cadastrar" class="btn-proximo">
            </form>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_SESSION["endereco"])){
    unset($_SESSION["endereco"]);
}
?>
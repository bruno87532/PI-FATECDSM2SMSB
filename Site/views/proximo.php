<?php
require_once __DIR__."/../utils/autoload.php";
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
$ceperror = new Validator();
$estilocep = $ceperror->cep_valido();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="public/styles/style.css">
</head>
<body>
    <body class="imgfundocadastro">
    <div class="container-externo">
        <div class="container-cadastro">
            <h2>Cadastre-se</h2>
            <form class="formulario-cadastro" id="form" action="<?php echo (isset($_SESSION['doctor'])) ? 'acessomed' : 'acesso' ?>" method="POST">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"]->getCep() : ""; ?>"> 
                <p id="invalid" style='<?php echo $estilocep ?>'>Cep inválido.</p>
                <p id="exists" style='display: none;'>Cep não existe.</p>
                
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"]->getCidade() : ""; ?>">
                
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"]->getBairro() : ""; ?>">
                
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua" required value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"]->getRua() : ""; ?>">
                
                <label for="numero_casa">Nº:</label>
                <input type="text" id="numero_casa" name="numero_casa" required value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"]->getNumero() : ""; ?>">
                
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" value="<?php echo isset($_SESSION["address"]) && isset($_SESSION["address"]->complemento) ? $_SESSION["address"]->getComplemento() : ""; ?>">
                 
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option disabled selected>Selecione um estado</option>
                    <?php
                        $estados = [
                            "AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ",  "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"
                        ];
                        foreach($estados as $estado){
                            echo '<option value="'.$estado.'">'.$estado.'</option>';
                        }
                        if(isset($_SESSION["address"])){
                            echo '<option selected value="'.$_SESSION["address"]->getEstado().'">'.$_SESSION["address"]->getEstado().'</option>';
                        }
                    ?>
                </select>
                <input type="submit" value="Cadastrar" class="btn-proximo">
            </form>
        </div>
    </div>
    </>

</body>
</html>
<script>
    document.getElementById('cep').addEventListener('blur', function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep.length != 8) {
            document.getElementById('invalid').style.display = "block";
            document.getElementById('invalid').style.color = "red";
            return;
        }else{
            document.getElementById('invalid').style.display = "none";
        }
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                if (!("erro" in data)) {
                    document.getElementById('rua').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    var selecionaEstado = document.getElementById('estado');
                    for (var x = 0; x < selecionaEstado.options.length; x++) {
                        console.log(data.uf);
                        if (selecionaEstado.options[x].textContent === data.uf) {
                        selecionaEstado.selectedIndex = x;
                        break;
                        }
                    }
                    if(document.getElementById('exists').style.display == "block"){
                        document.getElementById('exists').style.display = "none"
                    }
                } else {
                    document.getElementById('exists').style.display = "block";
                    document.getElementById('exists').style.color = "red";
                }
            }
        };
        xhr.send();
    });
</script>
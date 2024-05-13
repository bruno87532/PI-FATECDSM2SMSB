<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Consulta</title>
</head>
<body>
    <div class="imgfundocadastro">
    <div class="container-cadastro">
        <h2>Agendar Consulta</h2><br>
        <form class="formulario-cadastro">
            <label for="especializacao">Especialização:</label>
            <select id="especializacao" name="especializacao" required>
                <option value="#">.......</option>
                <option value="Cardiologia">Cardiologia</option>
                <option value="Ginecologia">Ginecologia</option>
                <option value="Dermatologia">Dermatologia</option>
                <option value="Oftalmologia">Oftalmologia</option>
                <option value="Nutricionista">Nutricionista</option>
                <option value="Fisioterapia">Fisioterapia</option>
                <option value="Psiquiatria">Psiquiatria</option>
                <option value="Traumatologia">Traumatologia</option>
                <option value="Infectologia">Infectologia</option>
            </select>
            <label for="cpf">Médico:</label>
            <input type="text" id="cpf" name="cpf" required>
            <label for="email">Data:</label>
            <input type="email" id="email" name="email" placeholder="dd/mm/aaaa" required>
            <label for="horario">Horario:</label>
            <select id="horario" name="horario" placeholder="00:00" required>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
                <option value="horaconsulta">00:00</option>
            </select>
        
            
            <div class="checkbox-group">
                <input type="checkbox" id="consulta" name="consulta" required>
                <label for="consulta">Consulta</label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="retorno" name="retorno" required>
                <label for="retorno">Retorno</label>
            </div>
        </form>
        <div class="btn-consulta">
            <a href="#"><button>Agendar Consulta</button></a>
        </div>
    </div>
</div>
</body>
</html>
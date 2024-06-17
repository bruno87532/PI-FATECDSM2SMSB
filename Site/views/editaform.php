<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Editar consulta</title>
</head>
<body>
    <div class="imgfundocadastro">
    <div class="container-cadastro">
        <h2>Editar Consulta</h2><br>
        <form class="formulario-cadastro" method="POST" action="<?php echo '../atualizapaciente/'.$consultas[0]['id']?>">
            <label for="dataC">Data da consulta</label>
            <input required type="date" value="<?php echo $consultas[0]['dataC'] ?>" name="dataC" id="dataC">
            <br><br>
            <div class="horarios-form">
                <div class="horarios">
                    <label for="hInicio">Horário inicio</label>
                    <input required type="time" value="<?php echo $consultas[0]['horarioInicio'] ?>" id="hInicio" name="hInicio">
                </div>
                <div class="horarios">
                    <label for="hFim">Horário de término</label>
                    <input required type="time" value="<?php echo $consultas[0]['horarioFim'] ?>" id="hFim" name="hFim">
                </div>
                </div> 
            <br>
            <?php
                if(isset($_SESSION['login_doctor'])){
                    echo '<label for="diagnostico">Diagnóstico</label>';
                    echo '<input type="text" value="'.$consultas[0]['diagnostico'].'" name="diagnostico" id="diagnostico">';
                    echo '<label for="tratamento">Tratamento</label>';
                    echo '<input type="text" value="'.$consultas[0]['tratamento'] .'" name="tratamento" id="tratamento">';
                }
            ?>
            <br>
            <label for="valor">Valor da consulta</label>
            <input required type="text" value="<?php echo (empty($consultas[0]['valor'])) ? '' : $consultas[0]['valor'] ?>" name="valor" id="valor">
            <br><br>
            <label for="statusC">Status da consulta</label>
            <select required name="statusC" id="statusC">
                <option <?php echo ($consultas[0]['statusC'] == 'a') ? 'selected' : '' ?> value="a">Agendada</option>
                <option <?php echo ($consultas[0]['statusC'] == 'd') ? 'selected' : '' ?> value="d">Concluida</option>''
                <option <?php echo ($consultas[0]['statusC'] == 'c') ? 'selected' : '' ?> value="c">Cancelada</option>
            </select>
            <br><br>
            <div class="btn-consulta">
                <input type="submit" class="btn-proximo" value="Atualizar consulta">
            </div>
        </form>
    </div>
</div>
</body>
</html>
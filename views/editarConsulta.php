<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="public/styles/style.css">
    <title>Editar Consulta</title>
   
</head>
<body>
    <div>
        <form action="buscapaciente" method="POST">
            <label for="busca">Digite o nome do paciente</label>
            <input type="text" name="busca" id="busca">
            <input type="submit" value="buscar">
        </form> 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome do paciente</th>
                    <th>Nome do médico</th>
                    <th>Data da consulta</th>
                    <th>Status da consulta</th>
                    <th>Diagnóstico</th>
                    <th>Tratamento</th>
                    <th>Valor da consulta</th>
                    <th>Horário de início da consulta</th>
                    <th>Horário de fim da consulta</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($consultas as $linha){
                    echo '<tr>';
                    foreach($linha as $string => $valor){
                        if(!($string == 'id')){
                            $valor = htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
                            if(strlen($valor) > 50){
                                $limite_string = substr($valor, 0, 50).'...';
                                echo '<td>'.$limite_string.'<img width="25px" data-texto="'.$valor.'" class="expandir" src="public/images/expandir.png" alt="Expandir">'.'</td>'; 
                            }else{
                                if($string == 'statusC' && $valor == 'a'){
                                    echo '<td>Agendada</td>';
                                }else if($string == 'statusC' && $valor == 'd'){
                                    echo '<td>Concluída</td>';
                                }else if($string == 'statusC' && $valor == 'c'){
                                    echo '<td>Cancelada</td>';
                                }else if($string == 'valor' && $valor == '0'){
                                    echo '<td></td>';
                                }else{
                                    echo '<td>'.$valor.'</td>';
                                }
                            }
                        }
                    }
                    echo '<td><a href="buscapaciente/' . $linha['id'] . '"><img width="30px" src="public/images/edit.png" class="editar" alt="Editar usuário"></a></td>';
                    echo '</tr>';
                } 
                ?>
            </tbody>
        </table>
    </div>
    <div id="textoCompleto" class="mostra-texto" style="display: none;">
        <p id="texto"></p>
        <button type="button" id="closeText">Fechar</button>
    </div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var imgs = document.querySelectorAll('.expandir');
        imgs.forEach(function(img){
            img.addEventListener('click', function() {
                var texto = this.getAttribute('data-texto');
                exibeTexto(texto);
            });
        });
        function exibeTexto(texto){
            document.getElementById('textoCompleto').style.display = 'block';
            var paragraph = document.getElementById('texto');
            paragraph.textContent = texto;
        }
        document.querySelector('#closeText').addEventListener('click', function(){
            var div = document.getElementById('textoCompleto');
            div.style.display = 'none';
        });
    });
</script>

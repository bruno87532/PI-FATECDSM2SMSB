<?php

require_once __DIR__ . "/../utils/autoload.php";

if (isset($_GET['action']) && $_GET['action'] == 'getMedicos' && isset($_GET['especializacao'])) {
    $especializacao = $_GET['especializacao'];

    $repository = new DoctorRepository();

    try {
        $medicos = $repository->getByEspecialidade($especializacao);
    
        echo json_encode($medicos);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
    

    exit;
}
if(isset($_GET['action']) && $_GET['action'] == 'getHorarios' && isset($_GET['medico']) && isset($_GET['dataC'])){
    $medico = $_GET['medico'];
    $dataC = $_GET['dataC'];
    $repository = new DoctorRepository();
    try{
        $horarios = $repository->getHorarios($medico, $dataC);
        echo json_encode($horarios);
        exit;
    }catch(Exception $e){
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}

$validaCampo = new ValidatorPatient();
$estilocpf = $validaCampo->cpf_existpat();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Consulta</title>
</head>
<body>
    <div class="imgfundocadastro">
        <div class="container-cadastro">
            <h2>Agendar Consulta</h2><br>
            <form class="formulario-cadastro" action="agendaconsulta/confirma" method="POST">
                <?php if(isset($_SESSION['employee'])){
                    echo '<label for="cpfpat">CPF do paciente:</label>';
                    echo '<input type="text" id="cpfpat" name="cpfpat" required>';
                    echo '<p style="'.$estilocpf.'">Não há um paciente cadastrado com este CPF!</p>';
                } ?>
            
                <label for="especializacao">Especialização:</label>
                <select id="especializacao" name="especializacao" required onchange="CarregarMedicos(this.value)">
                    <option value="">Especialidades</option>
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
                
                <label for="medicos">Médico:</label>
                <select name="medicos" id="medicos" disabled onchange="habilitaData()"required>
                    <option value="">Selecione um medico</option>
                </select>

                <label for="data">Data:</label>
                <input type="date" id="data" name="data" min="<?php echo ((new DateTime())->modify('+1 day'))->format('Y-m-d') ?>" onkeydown="return false" disabled required onchange="CarregarHorarios()">

                <label for="horario">Horário:</label>
                <select name="horario" id="horario" required disabled>
                    <option value="">Selecione um horário</option>
                </select>
                <div class="btn-consulta">
                    <button type="submit">Agendar Consulta</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script>
    async function CarregarMedicos(especializacao) {
        if (especializacao && especializacao !== "") {
            try {
                const response = await fetch(`?action=getMedicos&especializacao=${especializacao}`);
                const jsonData = await response.json();

                if (Array.isArray(jsonData)) {
                    const medicosSelect = document.getElementById('medicos');
                    medicosSelect.disabled = false;
                    medicosSelect.innerHTML = '<option value="">Selecione um médico</option>';

                    jsonData.forEach(medico => {
                        const option = document.createElement('option');
                        option.value = medico.Id;
                        option.textContent = medico.Nome;
                        medicosSelect.appendChild(option);
                    });
                } else {
                    console.error("Resposta inválida:", jsonData);
                }
            } catch (error) {
                console.error("Erro ao carregar médicos:", error);
            }
        }else{
            const option = document.createElement('option');
            option.value = "";
            option.textContent = "Selecione um médico";
            const medico = document.getElementById('medicos');
            while(medico.length > 0){
                medico.remove(0);
            }
            medico.appendChild(option);
            medico.value = option.value;
            medico.disabled = true;
            const data = document.getElementById('data');
            if(data.value != ''){
                data.value = '';
                data.disabled = true;
                const horario = document.getElementById('horario');
                if(horario.value != ''){
                    const option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Selecione um horário';
                    while(horario.length > 0){
                        horario.remove(0);
                    }
                    horario.appendChild(option);
                    horario.value = option.value;
                    horario.disabled = true;
                }
            }
        } 
    }
    async function CarregarHorarios(){
        const medico = document.getElementById('medicos').value;
        const dataC = document.getElementById('data').value;
        const dataFormatada = dataC.replace(/-/g, '/');
        if(dataFormatada != "" && medico != ""){
            try{
                const input = document.getElementById('horario');
                input.disabled = false;
                const funcao = await fetch(`?action=getHorarios&medico=${medico}&dataC=${dataFormatada}`);
                const jsonData = await funcao.json();
                if (Array.isArray(jsonData)) {
                    const horariosSelect = document.getElementById('horario');
                    horariosSelect.innerHTML = '<option value="">Selecione um horário</option>';

                    jsonData.forEach(horario => {
                        const option = document.createElement('option');
                        option.value = horario;
                        option.textContent = horario;
                        horariosSelect.appendChild(option);
                    });
                } else {
                    console.error("Resposta inválida:", jsonData);
                }
            }catch(error){
                console.error("Erro ao carregar horários:", error);
            }
        }
    }
    async function habilitaData(){
        const medico = document.getElementById('medicos');
        const data = document.getElementById('data');
        data.disabled = false;
        const horario = document.getElementById('horario');
        if(horario.value != ''){
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Selecione um horário';
            while(horario.length > 0){
                horario.remove(0);
            }
            horario.appendChild(option);
            horario.value = option.value;
            horario.disabled = true;
        }
        if(medico.value == ""){
            data.disabled = true;
            data.value = '';
        }
    }
</script>
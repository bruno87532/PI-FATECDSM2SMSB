<?php 
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}

require_once __DIR__."/../utils/autoload.php";

$path = "http://127.0.0.1/PI-FATECDSM2SMSB/";
$ValidatorHome = new Validator();
$estilologin = $ValidatorHome->login();
$estilologout = $ValidatorHome->logout();
$estilonotmed = $ValidatorHome->notdoctor();
$estilopatient = $ValidatorHome->patient();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="container-top">
            <div class="flex">
                <a href=""><img src="public/images/logo.png" width="80px" height="70px" alt="" class="image-container-top"></a>
                <nav>
                    <ul>
                     
                        <li><a href="">Home</a></li>
                        <li><a href="#especialidades">Nossas Especialidades</a></li>                      
                        <li><a href="#contato">Contato</a></li>
                        <li><a href="#quemSomos">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="btn-contato">
                    <div class="btns-home">
                        <a href="consulta" style="<?php echo $estilonotmed ?>"><button class="btnhover">Agendar Consulta</button></a>
                        <a href="visualizaconsulta" style="<?php echo $estilopatient ?>"><button class="btnhover">Visualiza Consultas</button></a>
                    </div>
                </div>
                <nav>
    <ul class="link-login">
    <div class="nome-echo">
        <?php
     
        if(isset($_SESSION['login_nome'])) {
        
            $trimmed_name = trim($_SESSION['login_nome']);
           
            echo '<div class="nome-echo"><img src="public/images/icons8-male-user-24.png" width="30px" height="30px" alt=""> Olá, ' . explode(" ", $trimmed_name)[0] . ' |   </div>';
        }
    ?>
    </div>
        <div class="logout">
       
            <a style="<?php echo $estilologout; ?>" href="home">    Sair</a>
        </div> 
        <li><a style="<?php echo $estilologin; ?>" href="login"><img src="public/images/icons8-male-user-24.png" width="30px" height="30px" alt=""> Login </a></li>
    </ul>
                </nav>

            </div>
        </div>
    </header>

    <section class="banner">
        <img class="banner-image" src="public/images/teste.webp" alt="">
    </section>
<br>
    <section class="image-with-text">
        <div class="image-container">
            <img src="public/images/carrocel2.jpg" alt="Descrição da imagem">
        </div>
        <div class="text-container">
            <h2>Nossa Missão</h2>
            <p> Nosso missão é oferecer atendimento especializado, humano e de qualidade, reconhecendo que cada pessoa é única. Com o objetivo de proporcionar uma experiência personalizada que promava a melhoria de qualidade de vida de nossos pacientes.</p>
        </div>
    </section>
   <br><br id="especialidades" > 

    <section class="especialidades">
        <br>
        <h1>Especialidades</h1>
        <div class="botoes">
            <div class="row">
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/hypertension.png" alt="hypertension"/><span>Cardiologia</span></button>
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/uterus.png" alt="uterus"/><span>Ginecologia</span></button>
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/chickenpox.png" alt="chickenpox"/><span>Dermatologia</span></button>
            </div>
            <div class="row">
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/ophthalmology.png" alt="ophthalmology"/><span>Oftalmologia</span></button>
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/treatment-plan--v1.png" alt="treatment-plan--v1"/><span>Nutricionista</span></button>
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/examination.png" alt="examination"/><span>Fisioterapia</span></button>
            </div>
            <div class="row">
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/brain--v1.png" alt="brain--v1"/> <span>Psiquiatria</span> </button>
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/knee-joint.png" alt="knee-joint"/><span>Traumatologia</span></button>
                <button><img width="50" height="50" src="https://img.icons8.com/ios/50/virus.png" alt="virus"/><span>Infectologia</span></button>
            </div>
        </div>
    </section>
    <br><br id="quemSomos">
    <section class="image-with-text">
        <div class="image-container">
            <img src="public/images/ca2.jpg"  alt="Descrição da imagem">
        </div>
        <div class="text-container" >
            <h1 >Quem Somos</h1>
            <h2>Muito mais que um hospital</h2>
            <p>As Clínicas são um espaço de integração de profissionais de saúde altamente qualificados e experientes. Planejado para seu conforto e melhor atendimento. Aqui você encontra várias especialidades e uma série de exames complementares, num ambiente cuidadosamente criado para sua satisfação.</p>
        </div>
    </section>
    <br><br><br><br>
    
    <div id="carouselExampleInterval"class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/images/mg1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/images/mg2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/images/mg3.jpg" class="d-block w-100" alt="...">
            </div>
       
            <div class="text-container2">
                <h1>LIVRE-SE DAS <br> <span class="dores">DORES</span> FÍSICAS <br> E EMOCIONAIS.</h1>
                <br>
                <p>A Clínica <b>Saúde Sem Barreiras</b> é especialista no cuidado das dores físicas e emocionais. Livre-se das limitações que impedem seu bem-estar integral, encontrando o caminho para uma vida plena e saudável. Nossa abordagem personalizada e especializada visa não apenas aliviar as dores, mas também fortalecer sua saúde física e emocional, proporcionando-lhe as ferramentas necessárias para viver sem barreiras. </p><br>
                <div class="btn-contato2">
                    <a href="consulta" style="<?php echo $estilonotmed ?>"><button class="btnhover">Agendar Consulta</button></a>
                </div>
            </div>

        </div>
    </div>

    

    <section class="precos">
        
        <div class="containerplanos">
            <h1 class="planos">Conheça nossos planos</h1>
            <div class="row">
                <div class="col">
                    <h3>Plano Básico</h3><br>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> 3 consultas  3 retornos/ano</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Time Multidisciplinar</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Nivel 3 de prioridade</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Individual</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Cashback***</p>
                    <button class="btn-contratar">A partir de R$ 180,00/mês</button><br><br>
                    <span>Para saber mais sobre este Plano, clique no botão abaixo e fale com nosso atendimento pelo WhatsApp</span><br><br>
                    <button class="btn-contratar">Clique aqui</button>
                </div>
                <div class="col">
                    <h3>Plano Standard</h3><br>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> 4 consultas  4 retornos/ano</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Time Multidisciplinar</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Nivel 3 de prioridade</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Individual</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Cashback***</p>
                    <button class="btn-contratar">A partir de R$ 240,00/mês</button><br><br>
                    <span>Para saber mais sobre este Plano, clique no botão abaixo e fale com nosso atendimento pelo WhatsApp</span><br><br>
                    <button class="btn-contratar">Clique aqui</button>
                </div>
                <div class="col">
                    <h3>Plano Premium</h3><br>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> 6 consultas  6 retornos/ano</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Time Multidisciplinar</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Nivel 3 de prioridade</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Individual</p>
                    <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nGNgGAXDDzjPd+9wnueWRBXDnBa4dTkvcP/vvMB9b319PROFLnNrhRjmdsh+lT3PEDXMfr89CzFh5rTAbb/PTB8u/DYvcG9xXuC21WOiBzvFLquvr2dyWuC+FBpj641nGrOS7TIYCF0Vyuw0330h1BVwl1IUAaGrQpmdF7gtgrnUeYF7D8kuw+Z95wVu86GGUidpMPxnYHRe4DadOoYxIFxqsSqUkyqGDSoAAKAhc1GmQEzcAAAAAElFTkSuQmCC"> Cashback***</p>
                    <button class="btn-contratar">A partir de R$ 360,00/mês</button><br><br>
                    <span>Para saber mais sobre este Plano, clique no botão abaixo e fale com nosso atendimento pelo WhatsApp</span><br><br>
                    <button class="btn-contratar">Clique aqui</button>
                </div>
            </div>
        </div>
    </section>


    <div class="centered-image">
        <img src="public/images/logo.png" width="120px" alt="Descrição da imagem" id="contato">
    </div>
    
    <!-- Título -->
    <h2 class="footerh2" >A Saúde sem Barreira ESTÁ EM:</h2>
    
    <!-- Textos lado a lado -->
    <div class="text-containers3" >
        <div class="text-container3">
            <p>ARARAS - UNIDADE 1</p>
            <P>Rua Armando Salles de Oliveira nº 254</P>
            <p>(19) 3544-5201</p>
            <p>(19) 9984-0555</p>
        </div>
        <div class="text-container3">
            <p>LEME - UNIDADE 2</p>
            <P>Rua Alvaro Ribeiro nº 754, Centro</P>
            <p>(19) 3544-5201</p>
            <p>(19) 9984-0555</p>
        </div>
    </div>
    <br><br>
    <!-- Ícones das redes sociais -->
    <div class="social-icons">
        <h3>Siga-nós nas Redes Sociais:</h3>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAYAAAAe2bNZAAAACXBIWXMAAAsTAAALEwEAmpwYAAACUklEQVR4nO2Yz05TQRTGfyUswGBkZ4uwcO9NXdJ38A/hDYwvwJ+FCaBhaYgF60uAD4DlFRRdwdaNFjbWBRUEF1Vzkq9JublzmXszY1zwJZOb3p458/Wcb86cKVyjHGaAZaANHAKfSwyb9w5Ykr/CuAFsAb+An8Au0AJelhgtkTE/F0ATGPclMgV8An4AK8AEYWB+VoFTYB+o+UTEiHwBEuKgDnwVodwIbSkiSSQiw4QsQq9cBjPKqaUmNO4Dd1Pv1rTedNaEZYkslEYGeAT8Ac5ThG7q3WLWpLZ2TRGMSPCJnpUMm6ci81vp8VrzUNvQBzXZHmuhwTgCXgPVIdtR4AnwIMPPG+AgawFztO5BZF4i/yYBPgRmlQ773AV6wJyHr3WtW4rMPNAHtoFbDptJYEd2c7HI1BSRbYc2hlERoV4qZcHItJQaV0SyItRV7QpKZkRidRYpB+wc6uREshSZKe0WE2uZGlMLSSaR00ZBMg3Nu/c/ROax5lVDkqnoe9NAEWzG0AyqrF3tEh+Y3XcRIjSZqurGjmedeQucALdjkEEVtS9CrghNikhfmiEWmQGhnlLW1IINPTeVmhMPIrlkipzaVVXWTurU7ohQXmq8Tu22uvgiqKigJXpepaU09lz9zFKkTs+FQae3kNcD23XiX+CFyNxxGTTVtdcjE7EG/QzYyDOye8xH3WvqEYmY0D/43CxNiPuK0JpyGwLm57ki8v6KpusSxtW7XCivbW17u1M9KzBWNG9Pfs6VmrEyv2Za95pd1YMy/0IcaP5CnlivQQ7+ApZI0Rx97rsbAAAAAElFTkSuQmCC">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA0ElEQVR4nO2XvQkCQRCFPzTQAmzG3NjsKrADI63AwL8aDrOzEDExtAEDr4JLVwYuOmZF1rsdWPbBgw1med/+wgBMgTNQAy6SJesETGgHzshHIq9c2wmcsUkG4AnsgBVQdHwbGmADjPCrGhLg+iU4CsDCGmDmCV0CZRv+GhJg7An/dT7/AmgqrQGqpAGqjjWtlbp7XwCh2loDXKwBHn0BFB1rmit1TTKvwGUA8hGQLyH5Gbo+P6La8COqpVgaRCuAvRRLey4QoTsRAvAGDtKefwCfPDXuqh8UfAAAAABJRU5ErkJggg==">
    </div>
    <div class="copyright">
        <h5>
           <a href="">Política de privacidade</a>  |
           <a href="">Termos de responsabilidade </a> |
            © 2024 Clínica Saúde sem Barreiras - Cidade Araras todos os direitos reservados.
            Desenvolvido por Abner Souza
        </h5>
    </div>


  


</body>
</html>
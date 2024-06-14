<?php
require_once __DIR__."/../utils/autoload.php";
if(!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == true){
    $estilologin = "color: red; display: block";
}else{
    $estilologin = "color: red; display: none";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Links de Imagens</title>
</head>
<body>
<header>
        <div class="container-top">
            <div class="flex">
                <a href=""><img src="public/images/logo.png" width="80px" height="70px" alt="" class="image-container-top"></a>              
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
    <br><br>
<div class="fundoFuncionario">
<div class="container">
 
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 linksFuncionario">
            <a href="editarConsulta.php">
                <img src="public/images/editarConsulta.jpg" height="400px" class="img-fluid rounded" alt="Imagem 1">
            </a>
        </div>
        <div class="col-md-4 linksFuncionario">
            <a href="consulta">
                <img src="public/images/agendarConsulta.jpg" class="img-fluid rounded" alt="Imagem 2">
            </a>
        </div>
        <div class="col-md-4 linksFuncionario">
            <a href="cadastroMedico.php">
              <img src="public/images/cadastrarmedico.jpg" class="img-fluid rounded" alt="Imagem 3">
            </a>
        </div>
    </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

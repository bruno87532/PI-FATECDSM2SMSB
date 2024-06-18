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
if(isset($_SESSION['cad']) && $_SESSION['cad'] == true){
    $destroi_sessao = new Validator();
    $destroi_sessao->destroi_sessao();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
   <div class="imgfundologin">
    <div class="container-login">
        <div class="form-container">
            <div class="login-form">
                <form action="login/auth" method="POST">
                    <div class="form-group">
                        <img src="public/images/logo.png" width="85px" alt="" class="logo-login">
                        <label for="username">Usuário:</label>
                        <input type="text" placeholder="Digite seu email" id="email" name="email" class="form-control" required>
                    </div><br>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" placeholder="Digite sua senha" id="password" name="password" class="form-control" required>
                    </div>
                    <p style="<?php echo $estilologin ?>">Email ou senha inválidos</p>
                    <div class="btn-login">
                        <a href="#"><button class="btn-entrar-login">Entrar</button></a>
                    </div>
                </form>
                <div class="register-link mt-3">
                    <p>Não tem uma conta? <a id="teste" href="cadastro">Cadastre-se</a></p>
                </div>
            </div>
        </div>
    </div>
</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

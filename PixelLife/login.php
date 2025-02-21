<?php
session_start();
if (isset($_POST['fazerlogin']) && !empty($_POST['email']) && !empty($_POST['senha']) && $_POST['concordo'] == true) {

    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario'];

    $sql = "SELECT * FROM usuario WHERE nome_usuario = '$usuario' and email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);
    while ($load = mysqli_fetch_assoc($result)) {

        $_SESSION['id'] = $load['id'];

    }

    if (mysqli_num_rows($result) < 1) {

        unset($_SESSION['usuario']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['logado']);
        header('location: login.php');

    } else {

        $_SESSION['usuario'] = $usuario;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['logado'] = true;
        $_SESSION['imagem'] = "";
        header('location: profiles/user/myprofile.php');
    }

}

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="documentos/LogoRosa.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comme:wght@200;300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Login | PixelLife</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <div class="row">

        <div class="col-md-6"
            style="text-align: right; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin-right: -4px;">

            <div class="all" style="border-radius: 15px 0px 0px 15px;">
                <p id="txtimg">MANIFESTAÇÃO DA ARTE É MANIFESTAR OS DETALHES DA VIDA</p>
                <p id="txtimg2">Website por Equipe PixelLife</p>
                <img class="devian" src="documentos/imglogin.jpg" width="320" height="662px"
                    style="pointer-events: none; user-select: none; margin-top: -2px; border-radius: 5px 0px 0px 5px;">
            </div>

        </div>

        <div class="col-md-6"
            style="text-align: left; padding-left:15px;width: 340px; margin-left: -2px; margin-top: -2px; background-color: white; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius: 0px 5px 5px 0px;">

            <div class="all">

                <p class="tituloLogin">Login no PixelLife<a href="index.php"><img class="close"
                            src="documentos/close.png"></a></P>

                <form class="form" action="" method="post">

                    <label for="email">Seu Nome de Usuario:</label></br>
                    <input class="cxdt" type="text" name="usuario" required></br>

                    <label for="email">Seu email:</label></br>
                    <input class="cxdt" type="email" name="email" required></br>

                    <label for="senha">Sua senha:</label></br>
                    <input class="cxdt" type="password" name="senha" min="6" required>

                    <p class="msgSenha">Mínimo 6 Caracteres</p></br>
                    <p class="msgLGPD" id="concordar"><input type="checkbox" id="check" name="concordo"
                            style="margin-right: 15px; margin-top: -7px;">Concordo com os <a href="documentos/LGPD.pdf"
                            target="_blank">Termos de Contrato</a></p>

                    <input class="btLogin" type="submit" value="Concluir Login" name="fazerlogin">
                </form>

                <p id="membro">Não é um membro? <a href="cadastro.php">Cadastre-se</a></p>

                <hr color="black">
                <p class="motivacional">Turn your dream into reality with pixelLife</p>
                <p class="disclaimer" style="margin-top: 80px;">O projeto PixelLife é um projeto escolar e sem cunho no ramo de serviços reais.
                </p>

            </div>

        </div>

    </div>

</body>

</html>
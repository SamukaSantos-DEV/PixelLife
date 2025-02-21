<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['email']) == true and !isset($_SESSION['senha']) == true) {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['usuario']);
    unset($_SESSION['logado']);
    $logado = false;
} else {
    $logado = true;
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="documentos/LogoRosa.png">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comme:wght@200;300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/plano.css" />
    <title>Planos | PixelLife</title>

</head>

<body>
    <nav class="nav" id="nav1">
        <div class="container">
            <div class="logo">
                <a href="index.php" style="border-bottom: none;"><img src="documentos/LogoPixelLife.png" width="130px"
                        height="60px" style="margin-top: 3px;"></a>
            </div>
            <div class="main_list" id="mainListDiv">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="plano.php">Assine</a></li>
                    <li><a href="envioImagem.php">Upload</a></li>
                    <?php
                    if ($logado == true) {

                        echo '<li><a class="navLogin" href="profiles/user/myprofile.php">' . $_SESSION['usuario'] . '</a></li>';

                    } elseif ($logado == false) {
                        echo '<li><a href="cadastro.php">Cadastro</a></li>
							<li><a class="navLogin" href="login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="media_button">
                <button class="main_media_button" id="mediaButton">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="space"></div>
        <div class="col-md-3">

            <div class="all">
                <P CLASS="tituloPlano">ImageAcess</P>
                <center>
                    <hr style="width: 30%;">
                </center>
                <h5 class="preco">R$ 19,99</h5>
                <h5 class="mes">por 1 mês</h5>
                <a href="assinatura.php">
                    <center><input class="btAssinar" type="submit" value="Assinar" name="assinar"></center>
                </a>
                <p class="text"><b class="certo">✔</b> Alta visualização</p></br>
                <p class="text"><b class="certo">✔</b> Maior alcance</p></br>
                <p class="text1"><b class="errado">❌</b> Maior resolução das imagens</p></br>
                <p class="text1"><b class="errado">❌</b> Perfil verificado</p></br>
                <p class="text1"><b class="errado">❌</b> Suporte prioritário</p></br>
                <p class="text1"><b class="errado">❌</b> Licenças ampliadas</p></br>
            </div>
        </div>
        <div class="col-md-3">
            <div class="all">
                <P CLASS="tituloPlano">FotoPro</P>
                <center>
                    <hr style="width: 30%;">
                </center>
                <h5 class="preco">R$ 59,99</h5>
                <h5 class="mes">por 3 meses</h5>
                <a href="assinatura.php">
                    <center><input class="btAssinar" type="submit" value="Assinar" name="assinar"></center>
                </a>
                <p class="text"><b class="certo">✔</b> Alta visualização</p></br>
                <p class="text"><b class="certo">✔</b> Maior alcance</p></br>
                <p class="text1"><b class="errado">❌</b> Maior resolução das imagens</p></br>
                <p class="text1"><b class="errado">❌</b> Perfil verificado</p></br>
                <p class="text"><b class="certo">✔</b> Suporte prioritário</p></br>
                <p class="text"><b class="certo">✔</b> Licenças ampliadas</p></br>
            </div>
        </div>

        <div class="col-md-3">
            <div class="allDestak">
                <h1 CLASS="pop">POPULAR</h1>
                <P CLASS="tituloPlano">ImageXpert</P>
                <center>
                    <hr style="width: 30%;">
                </center>
                <h5 class="preco">R$ 219,99</h5>
                <h5 class="mes">por 1 ano</h5>

                <a href="assinatura.php">
                    <center><input class="btAssinar" type="submit" value="Assinar" name="assinar"></center>
                </a>
                <p class="text"><b class="certo">✔</b> Alta visualização</p></br>
                <p class="text"><b class="certo">✔</b> Maior alcance</p></br>
                <p class="text"><b class="certo">✔</b> Maior resolução das imagens</p></br>
                <p class="text"><b class="certo">✔</b> Perfil verificado</p></br>
                <p class="text"><b class="certo">✔</b> Suporte prioritário</p></br>
                <p class="text"><b class="certo">✔</b> Licenças ampliadas</p></br>
            </div>
        </div>
        <div class="space"></div>

    </div>






</body>

</html>
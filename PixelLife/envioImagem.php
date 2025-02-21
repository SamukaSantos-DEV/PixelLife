<?php
session_start();
include_once('config.php');
$logado = true;
if (!isset($_SESSION['email']) == true and !isset($_SESSION['senha']) == true) {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['usuario']);
    unset($_SESSION['logado']);
    header('location: login.php');
}

if (isset($_POST['concluirUpload']) && isset($_FILES['upload'])) {

    include_once('config.php');

    $arquivo = $_FILES['upload'];

    if ($arquivo['error']) {
        header('location: envioimagem.php');
    }

    $pasta = "uploads/";
    $nomeArquivo = $arquivo['name'];
    $novoNomeArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") {
        header('location: envioimagem.php');
    }
    $path = $pasta . $novoNomeArquivo . "." . $extensao;
    $certo = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeArquivo . "." . $extensao);
    $_SESSION['imagem'] = $path;

    if ($certo) {

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['preco'];

        $usuario = $_SESSION['usuario'];
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        $sql = "SELECT * FROM usuario
        WHERE nome_usuario = '$usuario' and email = '$email' and senha = '$senha'";

        $res = $conexao->query($sql);

        while ($exibe = mysqli_fetch_assoc($res)) {

            $id = $exibe['id'];

        }
        $_SESSION['id'] = $id;

        $sql2 = "INSERT INTO imagem (id,imagem,titulo,descricao,valor,fk_Usuario_id)
        VALUES ('','$path','$titulo','$descricao','$valor','$id')";

        $res2 = $conexao->query($sql2);

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
    <link rel="stylesheet" href="css/envioImagem.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comme:wght@200;300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Upload Imagem | PixelLife</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <nav class="nav" id="nav1">
        <div class="container">
            <div class="logo">
                <a href="index.html" style="border-bottom: none;"><img src="documentos/LogoPixelLife.png" width="130px"
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

    <div class="all">
        <P CLASS="tituloUpload">Upload no PixelLife</P>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="selecioneArquivos" style="margin-bottom: 10px;" class="text">Faça uplaod de uma
                    imagem:</label>

                <input class="form-control" type="file" name="upload" style="font-size: 15px; width: 380px;">
            </div>
            <label for="titulo" class="text">Insira o título:</label></br>
            <input type="text" name="titulo" class="cxdt" required></br>
            <label for="descricao" class="text">Insira a descriçao:</label></br>
            <input type="text" name="descricao" class="cxdt" required></br>
            <label for="preco" class="text">Insira o valor:</label></br>
            <input type="number" name="preco" class="cxdt" required step="0.01"></br>

            <input class="btUpload" type="submit" value="Concluir" name="concluirUpload">
        </form>
    </div>



</body>

</html>
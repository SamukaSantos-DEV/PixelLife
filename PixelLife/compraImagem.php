<?php
session_start();
include_once('config.php');
$logado = true;
if (!isset($_SESSION['email']) == true and !isset($_SESSION['senha']) == true) {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    $logado = false;
    header('location: login.php');
}

if (isset($_POST['concluirassinatura'])) {

    $pagamento = $_POST['pagamento'];
    $CPF = $_POST['CPF'];
    $numero_cartao = $_POST['numerocartao'];
    $vencimento = $_POST['vencimentocartao'];
    $cvv = $_POST['CVV'];

    $usuario = $_SESSION['usuario'];

    $sql = "INSERT INTO compra_imagem(id,pagamento,cpf,numero_cartao,vencimento,cvv)
    VALUES('','$pagamento','$CPF','$numero_cartao','$vencimento','$cvv')";

    $res = $conexao->query($sql);
    header('location: index.php');

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
    <link rel="stylesheet" href="css/compraImagem.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comme:wght@200;300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <title>Compra | PixelLife</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>



    <div class="all">
        <P class="tituloCompra">Aquisição de uma imagem<a href="index.php"><img class="close"
                    src="documentos/close.png"></a></P>
        <form class="form" action="" method="post">

            <p class="text">Tipo de pagamento:</p>
            <select id="selecao" style="margin-bottom: -50px;" name="pagamento">
                <option value="credito">Crédito</option>
                <option value="debito">Débito</option>
            </select><br><br>

            <label for="CPF" class="text">CPF:</label></br>
            <input type="number" class="cxdt" name="CPF" required><br><br>

            <img class="cartoes" src="documentos/mastercard.png" width="10%" style="margin-left: 10px;">
            <img class="cartoes" src="documentos/elo.png" width="10%">
            <img class="cartoes" src="documentos/hiper.png" width="10%">
            <img class="cartoes" src="documentos/visa.png" width="10%">
            <img class="cartoes" src="documentos/paypal.png" width="10%"><br>
            <label for="numerocartao" class="text">Número do cartão:</label></br>
            <input type="number" class="cxdt" name="numerocartao" required></br>

            <label for="vencimentocartao" class="text">Vencimento do cartão:</label></br>
            <input type="date" name="vencimentocartao" class="cxdt" required></br>

            <label for="CVV" class="text">CVV:</label></br>
            <input type="number" class="cxdt" name="CVV" required></br>
            <hr>

            <input class="btCompra" type="submit" value="Concluir" name="concluirassinatura">
        </form>
    </div>



</body>

</html>
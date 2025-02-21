<?php
session_start();
include_once('config.php');
if (!isset($_SESSION['email']) == true and !isset($_SESSION['senha']) == true) {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: login.php');
}

if (isset($_POST['concluirassinatura'])) {

    $pagamento = $_POST['pagamento'];
    $nome = $_POST['nome'];
    $cpf = $_POST['CPF'];
    $cartao = $_POST['numerocartao'];
    $vencimento = $_POST['vencimentocartao'];
    $cvv = $_POST['CVV'];

    $usuario = $_SESSION['usuario'];
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT * FROM usuario
    WHERE nome_usuario = '$usuario' and email = '$email' and senha = '$senha'";

    $res = $conexao->query($sql);

    while ($exibe = mysqli_fetch_assoc($res)) {

        $id = $exibe['id'];

    }

    $sql2 = "INSERT INTO assinatura(id,pagamento,nome,cpf,numero_cartao,vencimento,cvv)
    VALUES ('','$pagamento','$nome','$cpf','$cartao','$vencimento','$cvv')";

    $result = $conexao->query($sql2);

    $sql_id = "SELECT * FROM assinatura
    WHERE pagamento = '$pagamento' and nome = '$nome' and cpf = '$cpf' and numero_cartao = '$cartao' and vencimento = '$vencimento' and cvv = '$cvv'";

    $result2 = $conexao->query($sql_id);

    while ($load = mysqli_fetch_assoc($result2)) {

        $id_assinatura = $load['id'];

    }

    $sql3 = "UPDATE usuario
    SET fk_Assinatura_id = $id_assinatura
    WHERE email = '$email' and senha = '$senha' and nome_usuario = '$usuario'";

    $res2 = $conexao->query($sql3);
    header('location: profiles/user/myprofile.php');
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
    <link rel="stylesheet" href="css/assinatura.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comme:wght@200;300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Upgrade | PixelLife</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>


    <div class="all">
        <p class="tituloAssinatura">Assine no PixelLife<a href="index.php"><img class="close"
                    src="documentos/close.png"></a></P>
        <form class="form" action="" method="post">
            <p class="text">Pagamento: </p>
            <select id="selecao" name="pagamento">
                <option value="credito">Crédito</option>
                <option value="debito">Débito</option>
            </select><br>

            <label class="text" for="nome">Seu nome:</label></br>
            <input type="text" name="nome" required class="cxdt"></br>

            <label class="text" for="CPF">CPF:</label></br>
            <input type="number" name="CPF" required class="cxdt"><br><br>

            <img class="cartoes" src="documentos/mastercard.png" style="margin-left: 10px;" width="10%">
            <img class="cartoes" src="documentos/elo.png" width="10%">
            <img class="cartoes" src="documentos/hiper.png" width="10%">
            <img class="cartoes" src="documentos/visa.png" width="10%">
            <img class="cartoes" src="documentos/paypal.png" width="10%"><br>
            <label for="numerocartao">Número do Cartão: </label></br>
            <input type="number" name="numerocartao" required class="cxdt"></br>

            <label class="text" for="vencimentocartao">Vencimento:</label></br>
            <input type="date" name="vencimentocartao" required class="cxdt"></br>

            <label class="text" for="CVV">CVV: </label></br>
            <input type="number" name="CVV" required class="cxdt"></br>

            <input class="btAssinatura" type="submit" value="Concluir Pagamento" name="concluirassinatura">
        </form>
    </div>



</body>

</html>
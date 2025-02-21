<?php
session_start();
include_once('../../config.php');
$imagem = [];
$x = 0;
$foto = "";
if (!isset($_SESSION['email']) == true and !isset($_SESSION['senha']) == true) {

	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	header('location: ../../login.php');
}

$usuario = $_SESSION['usuario'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

$upload = "../../" . $_SESSION['imagem'];


if (isset($_POST['editarAvatar'])) {

	include_once('../../config.php');

	$arquivo = $_FILES['upload'];

	if ($arquivo['error']) {
		header('location: envioimagem.php');
	}

	$pasta = "../../foto_perfil/";
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


		$usuario = $_SESSION['usuario'];
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];


		$sql = "UPDATE usuario
		SET foto_perfil = '$path'
		WHERE nome_usuario = '$usuario' and email = '$email' and senha = '$senha'";
		$res = $conexao->query($sql);

	}

}

if (isset($_POST['sair'])) {

	unset($_SESSION['usuario']);
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	unset($_SESSION['logado']);
	session_destroy();
	header('location: ../../index.php');

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
	<link rel="icon" href="../../documentos/LogoRosa.png">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comme:wght@200;300&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<title>Meu Perfil | PixelLife</title>
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
	<link rel="stylesheet" href="fonts/icomoon/style.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">


	<style>
		#avatarPopup {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			box-shadow: #000000 0px 0px 1500px;
			background-color: white;
			padding: 15px;
			color: black;
			width: 400px;
			height: 200px;
			border-radius: 5px;
			display: none;
		}

		.btClose {
			border-bottom: none;
		}

		.close {
			position: absolute;
			margin: 0px 0px 10px 350px;
			width: 5%;
			transition: 0.5s;
			cursor: pointer;
		}

		#avatarPopup input {
			margin-left: -5px;
		}

		#tituloAvatar {
			font-size: 30px;
			color: black;
			margin-top: -5px;
			margin-bottom: 0px;
		}

		#labelAvatar {
			color: black;
			font-size: 18px;
			text-align: left;
		}

		#btAvatar {
			transition: 0.5s;
			width: 380px;
			background-image: linear-gradient(to right, #8a01da, #a23fff);
			border: none;
			color: white;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 5px;
			font-size: 13px;
		}

		#btAvatar:hover {
			border-radius: 5px;
		}

		#sair {
			background-color: red;
			color: white;
			text-transform: none;
		}

		#sair button {
			background-color: transparent;
			text-transform: none;
			margin-left: -27px;
			margin-bottom: -15px;
			color: white;
			height: 40px;
			width: 240px;
		}



		.uploads {

			transition: 0.5s;
			margin-right: 25px;
			margin-bottom: 25px;
			box-shadow: rgba(192, 192, 192, 0.35) 0px 0px 0px;

		}
	</style>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">
		<nav class="nav" id="nav1">
			<div class="container">
				<div class="logo">
					<a href="../../index.php" style="border-bottom: none;"><img
							src="../../documentos/LogoPixelLife.png" width="130px" height="60px"
							style="margin-top: 3px;"></a>
				</div>
				<div class="main_list" id="mainListDiv">
					<ul>
						<li><a href="../../index.php">Home</a></li>
						<li><a href="../../plano.php">Assine</a></li>

						<li><a href="../../envioImagem.php">Upload</a></li>
						<?php
						if ($_SESSION['logado'] == true) {

							echo '<li><a class="navLogin" href="myprofile.php">' . $_SESSION['usuario'] . '</a></li>';

						} elseif ($_SESSION['logado'] == false) {


							echo '<li><a href="../../cadastro.php">Cadastro</a></li>
							<li><a class="navLogin" href="../../login.php">Login</a></li>';
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

		<section class="home"></section>
	</div>

	<div id="perfil">

		<center>
			<?php



			$sql100 = "SELECT * FROM usuario
				WHERE nome_usuario = '$usuario' and email = '$email' and senha = '$senha' ";

			$res100 = $conexao->query($sql100);

			while ($load100 = mysqli_fetch_assoc($res100)) {

				$foto_perfil = $load100['foto_perfil'];

				if($foto_perfil != null){
					echo "<img src=\"" . $foto_perfil . "\" id=\"fotoPerfil\">";
				}
				else{
					echo "<img src=\"imagens/user.jpg\" id=\"fotoPerfil\">";
				}


				
			}



			?>
			<h1 id="nomeUsuario">
				<?php echo $_SESSION['usuario']; ?>
			</h1>
			<h3 id="emailUsuario">
				<?php echo $_SESSION['email']; ?>
			</h3>

			<div class="content">

				<div class="container">
					<div class="row justify-content-center text-center">
						<div class="col-md-5">
							<div class="dropdown custom-dropdown">
								<a href="#" data-toggle="dropdown" class="dropdown-link" aria-haspopup="true"
									aria-expanded="false" id="linkEditar" style="border-bottom: none;">Configurações ⚙
								</a>

								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<form method="post" style="height: 150px;">
										<a href="#" class="dropdown-item" onclick="editarAvatar()">Editar Avatar</a>
										<a href="editar/usuário.php" class="dropdown-item">Editar Nome de Usuário</a>
										<a href="editar/email.php" class="dropdown-item">Editar E-Mail</a>
										<a href="editar/senha.php" class="dropdown-item">Editar Senha</a>
										<a href="#" class="dropdown-item" id="sair"><button type="submit"
												style="cursor: pointer;" value="" name="sair">→ Sair da
												Conta</button></a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</center>

		<div id="infos">
			<br><br><br><br><br>
			<center>
				<h1 style="margin-bottom: 15px; text-transform: none;">Uploads</h1>

				<!-- aqui coloque as imagens caso ele já tenha feito algum upload -->
				<!-- exemplo -->

				<?php

				$id = $_SESSION['id'];
				$sql3 = "SELECT * FROM imagem
				WHERE fk_Usuario_id = $id";

				$res3 = $conexao->query($sql3);

				while ($load = mysqli_fetch_assoc($res3)) {

					echo "<img src=\"../../" . $load['imagem'] . "\" width=\"500px\" class=\"uploads\">";
				}

				?>
			</center>
		</div>

	</div>


	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.poptrox.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

	<div id="avatarPopup">
				<a onclick="fecharAvatar()" class="btClose"><img class="close" src="../../documentos/close.png"></a>
				<p id="tituloAvatar">Alterar Avatar</P>
				<form class="form" action="" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="selecioneArquivos" style="margin-bottom: 10px;" id="labelAvatar">Selecione uma
							imagem:</label>

						<input class="form-control" type="file" name="upload" style="font-size: 15px; width: 380px;"
							required>
					</div>
					<input class="btAvatar" type="submit" value="Concluir" name="editarAvatar" id="btAvatar">
				</form>
			</div>

			<script>
				function editarAvatar() {
					document.getElementById('avatarPopup').style.display = 'block';
				}
				function fecharAvatar() {
					document.getElementById('avatarPopup').style.display = 'none';
				}
			</script>
</body>

</html>
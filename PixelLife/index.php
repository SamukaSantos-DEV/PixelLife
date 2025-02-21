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
	<link rel="stylesheet" href="assets/css/main.css" />
	<title>Home | PixelLife</title>
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<?php

			if (!$logado) {
				echo '<h1><a href="login.php">Faça <strong>LOGIN</strong></a></h1>';
			} else {
				echo '<h1><a href="profiles/user/myprofile.php">' . $_SESSION['usuario'] . '</strong></a></h1>';
			}

			?>
			<nav>
				<ul>
					<li><button id="seta" href="#footer">↑</button></li>
				</ul>
			</nav>
		</header>


		<nav class="nav" id="nav1">
			<div class="container">
				<div class="logo">
					<a href="index.php" style="border-bottom: none;"><img src="documentos/LogoPixelLife.png"
							width="130px" height="60px" style="margin-top: 3px;"></a>
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

		<section class="home"></section>

		<!-- Main -->
		<div id="main">
			<?php

			$sql = "SELECT * FROM imagem";

			$res = $conexao->query($sql);

			while ($load = mysqli_fetch_assoc($res)) {


				$imagem = $load['imagem'];
				$titulo = $load['titulo'];
				$valor = $load['valor'];
				$usuario_id = $load['fk_Usuario_id'];

				$r = $conexao->query("SELECT * FROM usuario
					WHERE id = $usuario_id");

				while ($load2 = mysqli_fetch_assoc($r)) {

					$autor = $load2['nome_usuario'];
				}

				echo "<article class=\"thumb\">
					<a href=" . $imagem . " class=\"image\"><img src=" . $imagem . " /></a>
					<h2>$titulo</h2>
					<a href=\"#\" class=\"linkArtista\">
						<p>Autor: $autor</p>
					</a>
					<a href=\"compraImagem.php\">
					<button type=\"submit\" name=\"comprar\" class=\"botaoComprar\">Comprar Imagem</button>
					</a>
					<p class=\"valorImagem\">Compre por $valor</p>
					</article>";
			}



			?>
			<article class="thumb">
				<a href="images/fulls/01.jpg" class="image"><img src="images/thumbs/01.jpg" alt="" /></a>
				<h2>The Green's Dragon</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Zephyr Stormcloud</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/02.jpg" class="image"><img src="images/thumbs/02.jpg" alt="" /></a>
				<h2>Dragon Mountain</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Electra Nightshade</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/03.jpg" class="image"><img src="images/thumbs/03.jpg" alt="" /></a>
				<h2>Fantasy Forest</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Raven Shadowmoon</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/04.jpg" class="image"><img src="images/thumbs/04.jpg" alt="" /></a>
				<h2>Sakura's Sunset</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Orion Stardust</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/05.jpg" class="image"><img src="images/thumbs/05.jpg" alt="" /></a>
				<h2>Horses Align</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Lyra Starlight</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/06.jpg" class="image"><img src="images/thumbs/06.jpg" alt="" /></a>
				<h2>BMW Racing</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Phoenix Firewing</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/07.jpg" class="image"><img src="images/thumbs/07.jpg" alt="" /></a>
				<h2>Magic Mountains</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Luna Moonglade</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/08.jpg" class="image"><img src="images/thumbs/08.jpg" alt="" /></a>
				<h2>Alaska Breath</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Nova Sunburst</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/09.jpg" class="image"><img src="images/thumbs/09.jpg" alt="" /></a>
				<h2>The Owl's Guard</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Blaze Thunderbolt</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/10.jpg" class="image"><img src="images/thumbs/10.jpg" alt="" /></a>
				<h2>The Tiger</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Vega Skydancer</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/11.jpg" class="image"><img src="images/thumbs/11.jpg" alt="" /></a>
				<h2>Sea Dangers</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Solaris Blaze</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>
			<article class="thumb">
				<a href="images/fulls/12.jpg" class="image"><img src="images/thumbs/12.jpg" alt="" /></a>
				<h2>The Space Opera</h2>
				<a href="#" class="linkArtista">
					<p>Autor: Nebula Nightfall</p>
				</a>
				<a href="compraImagem.php">
					<button type="submit" name="comprar" class="botaoComprar">Comprar Imagem</button></a>
				<p class="valorImagem">Compre por R$7,99*</p>
			</article>

		</div>

		<div id="popup1">
			<div id="popup2">
				<h2>Termos de Contrato</h2>
				<p>Para usufruir de todo o WebSite, por favor, leia os <a href="documentos/LGPD.pdf"
						target="_blank">Termos de Contrato e Privacidade</a>.</p>
				<button type="submit" onclick="concordo()" id="btConcordar">CONCORDO</button>
			</div>
		</div>

		<hr>

		<div id="blocos" style="display: flex;">

			<div id="bloco1">
				<p>A VIDA NA PIXEL LIFE</p>
			</div>

			<div class="blocoTexto">
				<p>LUCRE COM SUA ARTE</p>
			</div>

			<div class="blocoTexto">
				<p>AJUDE OS ARTISTAS</p>
			</div>

			<div class="blocoTexto">
				<p>UNLEASH YOUR DREAMS</p>
			</div>
		</div>

		<hr>



		<!-- Footer -->
		<footer id="footer" class="panel">

			<h2 style="color: white; text-transform: none;" id="msgMotivacional">
				Querido(a) amigo(a),

				Hoje, venho compartilhar com você uma linda mensagem sobre um site de venda de arte, um lugar
				especial
				onde a beleza ganha vida e a criatividade floresce.

				Imagine-se em um mundo onde as cores dançam no palco da imaginação, onde as pinceladas revelam
				histórias
				e as formas ganham vida própria. Bem-vindo(a) a um lugar onde a arte se torna acessível a todos, um
				site
				que é um verdadeiro tesouro para os amantes das expressões artísticas.

				Neste espaço virtual, as paredes se transformam em galerias virtuais, repletas de obras-primas que
				capturam a essência da alma humana. Cada clique revela uma nova descoberta, uma janela para
				diferentes
				perspectivas, estilos e técnicas que enriquecem nosso olhar.

				Nele, você encontrará a diversidade de estilos que refletem a multiplicidade de pensamentos e
				emoções
				humanas. Das pinturas clássicas às fotografias contemporâneas, das esculturas imponentes às
				ilustrações
				encantadoras, todas as formas de arte são celebradas e ganham vida no clique de um botão.

				E o melhor de tudo é que este site de venda de arte não apenas proporciona uma experiência única,
				mas
				também apoia e valoriza os artistas por trás das obras. Cada compra é uma forma de reconhecimento,
				de
				incentivo à criatividade e ao talento, permitindo que eles continuem a nos encantar com suas
				criações.

				Então, mergulhe nessa jornada de descobertas, permita-se ser cativado(a) pela beleza que se revela a
				cada clique. Encontre uma peça que toque sua alma, que desperte emoções e inspire sua jornada
				pessoal. E
				saiba que, ao adquirir uma obra de arte, você se torna parte de uma história maior, uma história que
				celebra a arte como um meio de conectar corações e mentes.

				Que este site de venda de arte seja o seu santuário, um lugar onde a beleza encontra seu lar e a sua
				paixão pela arte encontra o seu propósito. Explore, descubra e deixe-se envolver pela magia da
				criação
				artística.
			</h2>


		</footer>

	</div>

	<!--Script-->
	<script type="text/javascript">

		function concordo() {
			document.getElementById('popup1').style.display = 'none';
		}

		window.onload = function () {
			if (!localStorage.getItem('concordou')) {
				// Se o usuário ainda não concordou, exiba a div de aviso
				var divAviso = document.getElementById('popup1');
				divAviso.style.display = 'block';

				// Obtém o botão "Concordar"
				var btnConcordar = document.getElementById('btConcordar');

				// Adiciona um evento de clique ao botão "Concordar"
				btnConcordar.addEventListener('click', function () {
					// Esconde a div de aviso
					divAviso.style.display = 'none';

					// Marca que o usuário concordou
					localStorage.setItem('concordou', 'true');
				});
			} else {
				// Caso o usuário já tenha concordado anteriormente, oculta a div de aviso
				var divAviso = document.getElementById('popup1');
				divAviso.style.display = 'none';
			}
		}

		window.addEventListener("load", function () {
			setTimeout(
				function open(event) {
					document.querySelector(".popup").style.display = "block";
				},
				2000
			)
		});


		document.querySelector("#close").addEventListener("click", function () {
			document.querySelector(".popup").style.display = "none";
		});
	</script>

	<!-- Scripts -->
	<script>
		var mainListDiv = document.getElementById("mainListDiv"),
			mediaButton = document.getElementById("mediaButton");

		mediaButton.onclick = function () {

			"use strict";

			mainListDiv.classList.toggle("show_list");
			mediaButton.classList.toggle("active");

		};
	</script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.poptrox.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>
<!DOCTYPE html>

<html lang="es">

<head>
	<title>Proyecto Beta DCD - v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./css/estilos.css" />
	<link rel="shortcut icon" href="./img/favicon.ico" />
</head>

<body>
	<header>
		<figure>
			<a class="enlaceLogo" href="./inicio.php">
				<img class="imagenLogo" src="./img/logoICCF.jpg" alt="Comunife Cali">
			</a>
		</figure>
		<h1>Proyecto Beta DCD - v1.0</h1>
		<p>Pagina Inicial</p>
	</header>
	<nav>
		<?php include "./inc/menu.php"; ?>
	</nav>
	<section>
		<article class="seleccionfecha">
			<?php include "./php/selectoresfecha.php"; ?>
		</article>
		<article class="calendario">
			<?php include "./php/calendario.php"; ?>
		</article>
		<article class="pasaje">
			
		</article>
		<article class="devocional">
			<?php include "./php/opcionesdevocional.php"; ?>
		</article>
		<article class="comentarios">
			
		</article>
	</section>
	<footer>
		<p class="piedepagina">WEBPro Soluciones</p>
		<p class="piedepagina">2015</p>
	</footer>

	<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$(".botonaños").click(function(){
				$(".secaños").slideToggle("400");
			});
			$(".botonmeses").click(function(){
				$(".secmeses").slideToggle("1000");
			});
			$(".opciondevocional").click(function(){
				var nombre = "sub" + $(this).attr("id");
				$("."+nombre).slideToggle("500");
			});
		});

	</script>

</body>

</html>
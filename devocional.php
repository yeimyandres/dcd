<?php
	session_start();

	if (!isset($_SESSION['IdUsuario']))
	{
?>
		<script language="Javascript">
			window.alert('Acceso no autorizado');
			window.location='../';
		</script>
<?php
	}
	else
	{
		date_default_timezone_set("America/Bogota");
		$idusuario = $_SESSION['IdUsuario'];
		$nombreusuario = $_SESSION['NombreUsuario'];
		$imagenusuario = $_SESSION['ImagenUsuario'];
?>
<!DOCTYPE html>

<html lang="es">

<head>
	<title>Proyecto Beta DCD - v1.0</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
		<div class="infousuario">
			<figure>
				<a class="iconousuario" href="./perfil.php">
					<img <?php echo "src='./img/usuarios/".$imagenusuario."' title='".utf8_encode($nombreusuario)."'" ?>>
				</a>
			</figure>
			<ul>
				<li>
					<a class="opcioncabecera" href="./php/salir.php">Cerrar Sesión</a>
				</li>
			</ul>
		</div>
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
			<?php include "./php/pasaje.php"; ?>			
		</article>
		<article class="devocional">
			<h2>MI DEVOCIONAL</h2>
			<?php include "./php/opcionesdevocional.php"; ?>
		</article>
		<article class="comentarios">
			<h2>Comentarios del pasaje del día de hoy</h2>
			<textarea name="txtcomentarios" id="txtcomentarios" cols="30" rows="5"></textarea>
			<input type="button" value="Guardar">
			<input type="button" value="Terminar">
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
<?php
}
?>
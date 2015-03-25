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
		<article>
			<h2>Bienvenido a DCD</h2>
			<p>Proyecto desarrollado pro WEBPro en su primera etapa (v1.0), el cual se encuentra
				en las etapas iniciales de diseño y desarrollo de la plataforma en linea</p>
		</article>
	</section>
	<footer>
		<p class="piedepagina">WEBPro Soluciones</p>
		<p class="piedepagina">2015</p>
	</footer>
</body>

</html>
<?php
}
?>
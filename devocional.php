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
		include "./inc/conexion.php";
		$enlace = Conectarse();
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
		<p>Devocional Diario</p>
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
		<article class="calendario" id="seccioncalendario">
			<?php include "./php/calendario.php"; ?>
		</article>
		<article class="pasaje" id="seccionpasaje">
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
			$("#menumovil").click(function(){
				$(".nomovil").slideToggle(400);
			});
			$(".botonaños").click(function(){
				$(".secaños").slideToggle("400");
			});
			$(".selectoraño").click(function(){
				var añoactual=$(this).attr("id");
				$(".botonaños").html(añoactual);
				$(".secaños").slideToggle("400");
				mostrarcalendario();
			});
			$(".botonmeses").click(function(){
				$(".secmeses").slideToggle("1000");
			});
			$(".opciondevocional").click(function(){
				var nombre = "sub" + $(this).attr("id");
				$("."+nombre).slideToggle("500");
			});
			$(".selectormes").click(function(){
				var idmes = $(this).attr("id");
				var nommes = $(this).html();
				$(".botonmeses").attr("id",idmes);
				$(".botonmeses").html(nommes);
				$(".secmeses").slideToggle("1000");
				mostrarcalendario();
			});
			$(".opciondia").click(function() {
				var numero = $(this).html();
				var diaelegido = $(this);
				mostrarpasaje(numero,diaelegido);
			});
		});
		function mostrarpasaje(numero,diaelegido){
			var meses = ["meses","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
			var mes = $(".botonmeses").attr("id");
			var year = $(".botonaños").html();

			$.ajax({
				url: './php/pasajedesdescript.php',
				type: 'POST',
				dataType: 'html',
				data: "mes="+mes+"&year="+year+"&dia="+numero,
			})
			.done(function(respuesta) {
				$("#seccionpasaje").html(respuesta);
				$(".diaactual").removeClass('diaactual');
				diaelegido.addClass('diaactual');
				$("#fechaactual").html("<b>Fecha Actual Seleccionada:</b><div id='mifecha'>"+numero+" de "+meses[mes]+" de "+year+"</div>");
			})
			.fail(function(a,b,c){
				alert("Datos error: "+a+", "+b+", "+c)
			});			
		}

		function mostrarcalendario(){
				var fecha = new Date();
				var dia = fecha.getDate();
				var mes = $(".botonmeses").attr("id");
				var year = $(".botonaños").html();			
				$.ajax({
					url: './php/calendariodesdescript.php',
					type: 'POST',
					dataType: 'html',
					data: "mes="+mes+"&year="+year+"&dia="+dia,
				})
				.done(function(respuesta) {
					$("#seccioncalendario").html(respuesta);
					$(".opciondia").click(function() {
						var numero = $(this).html();
						var diaelegido = $(this);
						mostrarpasaje(numero,diaelegido);
					});
				})
				.fail(function(a,b,c){
					alert("Datos error: "+a+", "+b+", "+c)
				});
		}

	</script>

</body>

</html>
<?php
}
?>
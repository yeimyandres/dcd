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
					<?php
						echo "<input type='hidden' id='idusuario' value=".$idusuario." />";
					?>
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
			<input type="button" value="Favorito">
			<input type="button" id="cmdguardar" name="cmdguardar" value="Guardar">
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
			$("#cmdguardar").click(function(){
				var iddevocional = $("#txtiddevocional").val();
				var idusuario = $("#idusuario").val();
				var dialog11 = $("#txtsubseccion11").val();
				var dialog12 = $("#txtsubseccion12").val();
				var dialog13 = $("#txtsubseccion13").val();
				var dialog21 = $("#txtsubseccion21").val();
				var dialog22 = $("#txtsubseccion22").val();
				var dialog23 = $("#txtsubseccion23").val();
				var dialog31 = $("#txtsubseccion31").val();
				var dialog32 = $("#txtsubseccion32").val();
				var cadena = "iddevocional="+iddevocional+"&idusuario="+idusuario;
				cadena += "&dialog11="+dialog11+"&dialog12="+dialog12+"&dialog13="+dialog13;
				cadena += "&dialog21="+dialog21+"&dialog22="+dialog22+"&dialog23="+dialog23;
				cadena += "&dialog31="+dialog31+"&dialog32="+dialog32;
				$.ajax({
					url: './php/guardardevocional.php',
					type: 'post',
					dataType: 'html',
					data: cadena
				})
				.done(function(e) {
					alert(e);
				})
				.fail(function() {
					console.log("error");
				});
				
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
				mostrarguardados();
			})
			.fail(function(a,b,c){
				alert("Datos error: "+a+", "+b+", "+c)
			});			
		}

		function mostrarguardados(iddevocional){
			var iddevocional = $("#txtiddevocional").val();
			var idusuario = $("#idusuario").val();
			$.ajax({
				url: './php/mostrarguardados.php',
				type: 'post',
				dataType: 'html',
				data: "iddevocional="+iddevocional+"&idusuario="+idusuario,
			})
			.done(function(resultado) {
				$(".devocional").html(resultado);
				$(".opciondevocional").click(function(){
					var nombre = "sub" + $(this).attr("id");
					$("."+nombre).slideToggle("500");
				});
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}

		function mostrarcalendario(){
				var fecha = new Date();
				var diacalendario = $("td.diaactual").html();
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
					var elegido = $("#dia"+diacalendario);
					mostrarpasaje(diacalendario,elegido);
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
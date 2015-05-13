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
		include "./inc/conexion.php";
		$enlace = Conectarse();
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
		<p>Configuracion del Devocional</p>
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

	<section class="seccionconfiguracion">
		<h2 class="titulotopico" id="1">Registro de pasajes</h2>
		<article class="topico" id="articulo1">
			<form name="frmregistropasaje" id="frmregistropasaje">
				<label for="cboyears">Año</label>
				<select name="cboyears" id="cboyears">
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
				</select>
				<label for="cbomeses">Mes</label>
				<select name="cbomeses" id="cbomeses">
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
				<div id="selecciondias"></div>
				<select name="lstpasajes" id="lstpasajes" size=4>
					<option value="0">Pasajes correspondientes a la fecha seleccionada</option>
				</select>
				<label for=""></label>
				<input type="text">
				<label for=""></label>
				<input type="text">
				<label for=""></label>
				<input type="text">
				<label for=""></label>
				<input type="text">
				<label for=""></label>
				<input type="text">
				<input type="submit">
			</form>
		</article>
	</section>
	<section class="seccionconfiguracion">
		<h2 class="titulotopico" id="2">Biblias</h2>
		<article class="topico" id="articulo2">
			
		</article>
	</section>
	<section class="seccionconfiguracion">
		<h2 class="titulotopico" id="3">Colores</h2>
		<article class="topico" id="articulo3">
			
		</article>
	</section>
	<section class="seccionconfiguracion">
		<h2 class="titulotopico" id="4">Fuentes</h2>
		<article class="topico" id="articulo4">
			
		</article>
	</section>

	<footer>
		<p class="piedepagina">WEBPro Soluciones</p>
		<p class="piedepagina">2015</p>
	</footer>

	<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$("h2.titulotopico").click(function(){
				var idseccion = $(this).attr("id");
				$("article.topico#articulo"+idseccion).slideToggle(400);
			});
			$("#menumovil").click(function(){
				$(".nomovil").slideToggle(400);
			});
			$("#cbomeses").change(function(){
				var year = $("#cboyears").val();
				var mes = $("#cbomeses").val();
				var dias = diasdelmes(mes,year);
				var textohtml = "<label for='cbodias'>Día</label><select name='cbodias' id='cbodias'>";
				for (var i = 1; i <= dias; i++) {
					textohtml += "<option value='"+i+"'>"+i+"</option>";
				};
				textohtml += "</select>";
				$("#selecciondias").html(textohtml);
				traerpasajes(1,mes,year);
				$("#cbodias").change(function(){
					var year = $("#cboyears").val();
					var mes = $("#cbomeses").val();
					var dia = $("#cbodias").val();
					traerpasajes(dia,mes,year);
				});				
			});
		});

		function traerpasajes(dia,mes,year){
			$.ajax({
				url: './php/traerpasajes.php',
				type: 'POST',
				dataType: 'html',
				data: 'dia='+parseInt(dia)+'&mes='+parseInt(mes)+'&year='+parseInt(year),
			})
			.done(function(respuesta){
				$("#lstpasajes").html(respuesta);
			})
			.fail(function(error) {
				console.log("error: "+error);
			})			
		}

		function diasdelmes(mes, year) {
			return new Date(year || new Date().getFullYear(), mes, 0).getDate();
		}


	</script>

</body>

</html>
<?php
}
?>
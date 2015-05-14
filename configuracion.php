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
				<?php
					$añoactual = date("Y");
					for ($i=$añoactual; $i < $añoactual+3; $i++) { 
						echo "<option value='$i'>$i</option>";
					}
				?>					
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
				<label for="lstpasajes">Pasajes registrados para la fecha</label>
				<select name="lstpasajes" id="lstpasajes" size=4>
					<option value="0">Pasajes correspondientes a la fecha seleccionada</option>
				</select>
				<input type="button" id="cmdeliminar" name="cmdeliminar" value="Eliminar pasaje">
				<label for="lstlibros">Libros</label>
				<select name="lstlibros" id="lstlibros">
					<?php
						$cadenaSQL = "SELECT idlibro, nomlibro FROM libros ORDER BY idlibro";
						$resultado = mysqli_query($enlace, $cadenaSQL);
						while($libro=mysqli_fetch_row($resultado)){
							echo "<option value='".$libro[0]."'>".utf8_encode($libro[1]);
							echo "</option>";
						}
					?>					
				</select>
				<label id="lblcapitulos" for="lstcapitulos">Capítulos</label>
				<select name="lstcapitulos" id="lstcapitulos">
				</select>
				<label id="lblversiculosini" for="lstversiculosini">Versículo Inicial</label>
				<select name="lstversiculosini" id="lstversiculosini">
				</select>
				<label id="lblversiculosfin" for="lstversiculosfin">Versículo Final</label>
				<select name="lstversiculosfin" id="lstversiculosfin"></select>
				<input type="button" id="cmdagregar" name="cmdagregar" value="Agregar pasaje">
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
			$("#lblcapitulos").hide();
			$("#lblversiculosini").hide();
			$("#lblversiculosfin").hide();			
			$("#lstcapitulos").hide();
			$("#lstversiculosini").hide();
			$("#lstversiculosfin").hide();
			var d = new Date();
			var month = d.getMonth()+1;
			var yearinicio = d.getFullYear();
			var dayinicio = d.getDate();
			$("#cbomeses").val(month);

			var diasinicio = diasdelmes(month,yearinicio);
			var textohtmlinicio = "<label for='cbodias'>Día</label><select name='cbodias' id='cbodias'>";
			for (var i = 1; i <= diasinicio; i++) {
				textohtmlinicio += "<option value='"+i+"'>"+i+"</option>";
			};
			textohtmlinicio += "</select>";
			$("#selecciondias").html(textohtmlinicio);
			$("#cbodias").val(dayinicio);
			traerpasajes(dayinicio,month,yearinicio);
			$("#cbodias").change(function(){
				var year = $("#cboyears").val();
				var mes = $("#cbomeses").val();
				var dia = $("#cbodias").val();
				traerpasajes(dia,mes,year);
			});	
			$("h2.titulotopico").click(function(){
				var idseccion = $(this).attr("id");
				$("article.topico#articulo"+idseccion).slideToggle(400);
			});
			$("#lstlibros").change(function(){
				var libro = $(this).val();
				$.ajax({
					url: './php/traercapitulos.php',
					type: 'POST',
					dataType: 'html',
					data: "libro="+libro,
				})
				.done(function(respuesta) {
					$("#lstcapitulos").html(respuesta);
					$("#lblcapitulos").show();
					$("#lstcapitulos").show();
					$("#lstcapitulos").change(function(){
						var capitulo = $(this).val();
						$.ajax({
							url: './php/traerversiculos.php',
							type: 'POST',
							dataType: 'html',
							data: "libro="+libro+"&capitulo="+capitulo,
						})
						.done(function(respuesta) {
							$("#lblversiculosini").show();
							$("#lstversiculosini").show();
							$("#lblversiculosfin").show();
							$("#lstversiculosfin").show();
							$("#lstversiculosini").html(respuesta);
							$("#lstversiculosfin").html(respuesta);
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});
						
					});
				})
				.fail(function(error) {
					console.log("error: "+error);
				});				
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
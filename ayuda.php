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
		<p>Ayuda para el manejo de la plataforma</p>
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
	<?php
		$cadenaSQL = "SELECT idseccionayuda, nomseccionayuda FROM seccionesayuda ORDER BY idseccionayuda";
		if($resultado = mysqli_query($enlace, $cadenaSQL))
		{
			while($fila = mysqli_fetch_row($resultado))
			{
				echo "<section class='seccionayuda' id=$fila[0]>";
				$cadenaSQL = "SELECT i.titularayuda, i.detalleayuda, s.nomseccionayuda FROM itemsayuda AS i, seccionesayuda AS s WHERE i.idseccionayuda = ".$fila[0]." AND i.idseccionayuda=s.idseccionayuda";
				$resultado2 = mysqli_query($enlace, $cadenaSQL);
				$registros = mysqli_num_rows($resultado2);
				if($registros>0){
					if($registros==1){
						$tema = "tema";
					}else{
						$tema = "temas";
					}
				}
				echo "<h2 class='nombreseccion' id='seccion".$fila[0]."'>".utf8_encode($fila[1])." (".$registros." ".$tema.")</h2>";
				while($fila2 = mysqli_fetch_row($resultado2))
				{
					echo "<article class='articuloayuda' id='articuloseccion".$fila[0]."'>";
					echo "<p class='titular'>".utf8_encode($fila2[0])."</p>";
					echo "<p class='detalle'>".utf8_encode($fila2[1])."</p>";
					echo "</article>";
				}
				echo "</section>";
			}
		}
	?>

	<footer>
		<p class="piedepagina">WEBPro Soluciones</p>
		<p class="piedepagina">2015</p>
	</footer>

	<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$("h2.nombreseccion").click(function(){
				var idseccion = $(this).attr("id");
				$("article.articuloayuda#articulo"+idseccion).slideToggle(400);
			});
		});

	</script>

</body>

</html>
<?php
}
?>
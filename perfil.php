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
		include './inc/conexion.php';
		include './inc/datosusuarioperfil.php';
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
		<p>Configuración del perfil de Usuario</p>
	</header>
	<nav>
		<?php include "./inc/menu.php"; ?>
	</nav>
	<section class="configuracionPerfil">
		<article>
			<h2>Configuración de Perfil de Usuario</h2>
			<figure>
				<a class="fotoPerfil">
					<img <?php echo "src='./img/usuarios/".utf8_encode($fotousuario)."'" ?> />
				</a>
			</figure>
			<form id="frmdatosbasicos" action="actualizadatos.php" method="post">
				<label for="txtusuario">Nombre de Usuario</label>
				<input id="txtusuario" type="text" <?php echo "value='".$idusuario."'" ?> />
				<label for="txtnombre">Nombre Completo del Usuario</label>
				<input id="txtnombre" type="text" <?php echo "value='".utf8_encode($nombreusuario)."'" ?> />
				<label for="txtemail">Correo Electrónico</label>
				<input id="txtemail" type="email" <?php echo "value='".$emailusuario."'" ?> />
				<label for="cbociudades">Ciudades</label>
				<select name="cbociudades" id="cbociudades">
					<option value=0>Seleccione su ciudad</option>
					<?php
						$cadenaSQL = "SELECT * FROM ciudades ORDER BY nomciudad";
						if($resultado = mysqli_query($enlace, $cadenaSQL)){
							while($fila = mysqli_fetch_row($resultado)){
								echo "<option value=$fila[0]";
								if ($fila[0] == $ciudadusuario) {
									echo " selected";
								}
								echo ">".utf8_encode($fila[1])."</option>";
							}
						}
					?>
				</select>
				<label for="cbozonas">Zona de Ubicación</label>
				<select name="cbozonas" id="cbozonas">
					<option value=0>Seleccione su Zona</option>
					<?php
						$cadenaSQL = "SELECT idzona, nomzona FROM ZONAS WHERE idciudad = $ciudadusuario ORDER BY nomzona";
						if($resultado = mysqli_query($enlace, $cadenaSQL)){
							while($fila = mysqli_fetch_row($resultado)){
								echo "<option value=$fila[0]";
								if ($fila[0] == $zonausuario) {
									echo " selected";
								}
								echo ">".utf8_encode($fila[1])."</option>";
							}
						}
					?>
				</select>
				<input type="submit" value="Actualizar Datos Básicos" />
			</form>
			<hr>
			<form action="actualizapassword.php" id="frmactualizapassword" method="post">
				<label for="txtpassword1">Contraseña Anterior</label>
				<input id="txtpassword1" type="password" />
				<label for="txtpassword2">Contraseña Nueva</label>
				<input id="txtpassword2" type="password" />
				<label for="txtpassword3">Confirmar Contraseña Nueva</label>
				<input id="txtpassword3" type="password" />
				<input type="submit" value="Actualizar Contraseña" />
			</form>
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
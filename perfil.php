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
			<a class="enlaceLogo">
				<img class="imagenLogo" src="./img/logoICCF.jpg" alt="Comunife Cali">
			</a>
		</figure>
		<h1>Proyecto Beta DCD - v1.0</h1>
		<p>Pagina Inicial</p>
	</header>
	<nav>
		<?php include "./inc/menu.php"; ?>
	</nav>
	<section class="configuracionPerfil">
		<article>
			<h2>Configuración de Perfil de Usuario</h2>
			<figure>
				<a class="fotoPerfil" alt="Usuario Actual">
					<img src="./img/perfiles/sinfoto.jpg" alt="Usuario Actual">
				</a>
			</figure>
			<form id="frmdatosbasicos" action="actualizadatos.php" method="post">
				<label for="txtusuario">Nombre de Usuario</label>
				<input id="txtusuario" type="text" value="usuarioactual" />
				<label for="txtnombre">Nombre Completo del Usuario</label>
				<input id="txtnombre" type="text" value="Usuario Actual" />
				<label for="txtemail">Correo Electrónico</label>
				<input id="txtemail" type="email" value="usuarioActual@correo.com" />
				<select name="cbociudades" id="cbociudades">
					<option value=0>Seleccione su ciudad</option>
					<option value=1>Cali</option>
					<option value=2>Bogotá</option>
					<option value=3>Palmira</option>
					<option value=4>Yumbo</option>
				</select>
				<select name="cbozonas" id="cbozonas">
					<option value=0>Seleccione su Zona</option>
					<option value="1">Centro</option>
					<option value="2">Norte</option>
					<option value="3">Occidente</option>
					<option value="4">Oriente</option>
					<option value="5">Sur</option>
				</select>
				<input type="submit" value="Actualizar Datos Básicos" />
			</form>
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
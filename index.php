<!DOCTYPE html>

<html lang="es">

<head>

	<title>Login Maqueta DCD</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/estilologin.css" />

</head>

<body>

	<header>
		<h1>Proyecto DCD</h1>
		<p>Versión Beta</p>
	</header>

	<section>
		<figure>
			<img class="logo" src="./img/logoICCF.jpg" alt="Comunidad Cristiana de Fe">
		</figure>
		<h2>Ingreso de Usuario</h2>
		<form action="./php/validarsesion.php" method="post">
			<input id="txtusuario" name="txtusuario" type="text" placeholder="Nombre de Usuario" autofocus />
			<input id="txtclave" name="txtclave" type="password" placeholder="Contraseña" />
			<input type="submit" value="Ingresar" />
		</form>
	</section>

	<footer>
		<p class="piedepagina">WEBPro Soluciones</p>
		<p class="piedepagina">2015</p>
	</footer>

</body>

</html>
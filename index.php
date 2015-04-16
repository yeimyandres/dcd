<!DOCTYPE html>

<html lang="es">

<head>

	<title>Login Maqueta DCD</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/estilologin.css" />
	<link rel="shortcut icon" href="./img/favicon.ico" />
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
		<form id="frmingreso" action="./php/validarsesion.php" method="post">
			<input id="txtusuarioi" name="txtusuarioi" type="text" placeholder="Nombre de Usuario" autofocus />
			<input id="txtclavei" name="txtclavei" type="password" placeholder="Contraseña" />
			<input type="submit" value="Ingresar" />
		</form>
		<br>
		<a class="registrarse">Registrarme</a>
		<form id="frmregistro" action="./php/registrarusuario.php" method="post">
			<input id="txtusuarior" name="txtusuarior" type="text" placeholder="Nombre de Usuario"/>
			<input id="txtnombrer" name="txtnombrer" type="text" placeholder="Nombres y apellidos completos" />
			<input id="txtemailr" name="txtemailr" type="text" placeholder="Correo Electrónico">
			<input id="txtclaver1" name="txtclaver1" type="password" placeholder="Contraseña" />
			<input id="txtclaver2" name="txtclaver2" type="password" placeholder="Confirmar Contraseña" />
			<input type="submit" value="Registrar" />
		</form>		
	</section>

	<footer>
		<p class="piedepagina">WEBPro Soluciones</p>
		<p class="piedepagina">2015</p>
	</footer>

</body>

	<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("a.registrarse").click(function(){
				if($("form#frmregistro").is(":visible")){
				    $("form#frmregistro").hide(400);
				    $("form#frmingreso").show(400);
				    $(this).html("Registrarme");
				    $("input#txtusuarioi").focus();
				}else{
				    $("form#frmregistro").show(400);
				    $("form#frmingreso").hide(400);
				    $(this).html("Ingresar");
				    $("input#txtusuarior").focus();
				}				
			});
		});
	</script>

</html>
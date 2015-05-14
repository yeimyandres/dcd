<?php

	include "../inc/conexion.php";

	$enlace = Conectarse();

	$libro = $_POST["libro"];
	$capitulo = $_POST["capitulo"];

	echo $libro;

	$cadenaSQl = "SELECT versiculo FROM escrituras WHERE idlibro = $libro AND capitulo = $capitulo ORDER BY versiculo";

	$resultado = mysqli_query($enlace,$cadenaSQl);

	while($versiculo=mysqli_fetch_row($resultado)){
		echo "<option value='".$versiculo[0]."'>".$versiculo[0];
		echo "</option>";
	}

?>
<?php

	include "../inc/conexion.php";

	$enlace = Conectarse();

	$libro = $_POST["libro"];

	echo $libro;

	$cadenaSQl = "SELECT DISTINCT capitulo FROM escrituras WHERE idlibro = $libro ORDER BY capitulo";

	$resultado = mysqli_query($enlace,$cadenaSQl);

	while($capitulo=mysqli_fetch_row($resultado)){
		echo "<option value='".$capitulo[0]."'>".$capitulo[0];
		echo "</option>";
	}

?>
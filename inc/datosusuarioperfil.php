<?php

	$enlace = Conectarse();

	$cadenaSQL = "SELECT * FROM usuarios WHERE idusuario = '".$idusuario."'";

	if($resultado = mysqli_query($enlace, $cadenaSQL)){
		while($fila = mysqli_fetch_row($resultado)){
			$nombreusuario = $fila[1];
			$emailusuario = $fila[2];
		}
	}

?>

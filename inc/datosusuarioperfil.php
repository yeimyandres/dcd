<?php

	$enlace = Conectarse();

	$cadenaSQL = "SELECT * FROM usuarios WHERE idusuario = '".$idusuario."'";

	if($resultado = mysqli_query($enlace, $cadenaSQL)){
		while($fila = mysqli_fetch_row($resultado)){
			$nombreusuario = $fila[1];
			$emailusuario = $fila[2];
			$zonausuario = $fila[5];
			$fotousuario = $fila[6];
		}
	}

	$cadenaSQL = "SELECT idciudad FROM zonas WHERE idzona=".$zonausuario;
	$resultado = mysqli_query($enlace, $cadenaSQL);
	$fila = mysqli_fetch_row($resultado);
	$ciudadusuario = $fila[0];

?>

<?php

	include "../inc/conexion.php";

	$enlace = Conectarse();

	$iddevocional = $_POST["iddevocional"];
	$idusuario = $_POST["idusuario"];
	$dialog11 = $_POST["dialog11"];
	$dialog12 = $_POST["dialog12"];
	$dialog13 = $_POST["dialog13"];
	$dialog21 = $_POST["dialog21"];
	$dialog22 = $_POST["dialog22"];
	$dialog23 = $_POST["dialog23"];
	$dialog31 = $_POST["dialog31"];
	$dialog32 = $_POST["dialog32"];

	$cadenaSQL = "SELECT estado FROM dialogando WHERE iddevocional = $iddevocional AND idusuario = '$idusuario'";	

	$resultado = mysqli_query($enlace,$cadenaSQL);

	if(mysqli_affected_rows($enlace)>=1){

		$registro = mysqli_fetch_row($resultado);
		
		if($registro[0]=="T"){

			$cadenaSQL = "UPDATE dialogando SET dialog11='".utf8_decode($dialog11)."', dialog12='".utf8_decode($dialog12)."', dialog13='".utf8_decode($dialog13)."', dialog21='".utf8_decode($dialog21)."', dialog22='".utf8_decode($dialog22)."', dialog23='".utf8_decode($dialog23)."', dialog31='".utf8_decode($dialog31)."', dialog32='".utf8_decode($dialog32)."' WHERE iddevocional=$iddevocional AND idusuario='$idusuario'";

		}

	}else{

			$cadenaSQL = "INSERT INTO dialogando(iddevocional,idusuario,dialog11,dialog12,dialog13,dialog21,dialog22,dialog23,dialog31,dialog32,estado) VALUES($iddevocional,'$idusuario','".utf8_decode($dialog11)."','".utf8_decode($dialog12)."','".utf8_decode($dialog13)."','".utf8_decode($dialog21)."','".utf8_decode($dialog22)."','".utf8_decode($dialog23)."','".utf8_decode($dialog31)."','".utf8_decode($dialog32)."','T')";

	}

	if($resultado = mysqli_query($enlace,$cadenaSQL)){
		echo "Dialogando para el usuario ".$idusuario." guardado con exito";
	}else{
		echo "no pudo guardarse el dialogando del usuario ".$idusuario;
	}

?>
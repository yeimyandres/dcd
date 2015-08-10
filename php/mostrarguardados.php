<?php

	function secciondevocional($d11,$d12,$d13,$d21,$d22,$d23,$d31,$d32){

		echo "<ul>";
		echo "<li>";
		echo "<a class='opciondevocional' id='seccion1'>DIOS ME HABLA</a>";
		echo "<div class='subseccion1'>";
		echo "<p class='etiquetadevocional'>Hay alguna enseñanza acerca de Dios Padre, Jesucristo o el Espíritu Santo ?</p>";
		echo "<textarea name='txtsubseccion11' id='txtsubseccion11' cols='30' rows='5'>".utf8_encode($d11)."</textarea>";
		echo "<p class='etiquetadevocional'>Hay algún mandamiento que debo obedecer ?</p>";
		echo "<textarea name='txtsubseccion12' id='txtsubseccion12' cols='30' rows='5'>".utf8_encode($d12)."</textarea>";
		echo "<p class='etiquetadevocional'>Hay alguna advertencia que debo considerar ?</p>";
		echo "<textarea name='txtsubseccion13' id='txtsubseccion13' cols='30' rows='5'>".utf8_encode($d13)."</textarea>";
		echo "</div>";
		echo "</li>";
		echo "<li>";
		echo "<a class='opciondevocional' id='seccion2'>YO HABLO CON DIOS</a>";
		echo "<div class='subseccion2'>";
		echo "<p class='etiquetadevocional'>Hay ejemplos que puedo seguir en mi vida ?</p>";
		echo "<textarea name='txtsubseccion21' id='txtsubseccion21' cols='30' rows='5'>".utf8_encode($d21)."</textarea>";
		echo "<p class='etiquetadevocional'>Señala este pasaje algún pecado que debo confesar y abandonar ?</p>";
		echo "<textarea name='txtsubseccion22' id='txtsubseccion22' cols='30' rows='5'>".utf8_encode($d22)."</textarea>";
		echo "<p class='etiquetadevocional'>Hay alguna promesa que puedo declarar (reclamar) ?</p>";
		echo "<textarea name='txtsubseccion23' id='txtsubseccion23' cols='30' rows='5'>".utf8_encode($d23)."</textarea>";
		echo "</div>";
		echo "</li>";
		echo "<li>";
		echo "<a class='opciondevocional' id='seccion3'>YO HABLO CON MI PASTOR</a>";
		echo "<div class='subseccion3'>";
		echo "<p class='etiquetadevocional'>Decido (qué?)</p>";
		echo "<textarea name='txtsubseccion31' id='txtsubseccion31' cols='30' rows='5'>".utf8_encode($d31)."</textarea>";
		echo "<p class='etiquetadevocional'>Me comprometo a (cómo?, cuando?)</p>";
		echo "<textarea name='txtsubseccion32' id='txtsubseccion32' cols='30' rows='5'>".utf8_encode($d32)."</textarea>";
		echo "</div>";
		echo "</li>";
		echo "</ul>";

	}

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$iddevocional = $_POST["iddevocional"];
	$idusuario = $_POST["idusuario"];

	$cadenaSQL = "SELECT * FROM dialogando WHERE iddevocional = $iddevocional AND idusuario = '$idusuario' AND estado = 'T'";	

	$resultado = mysqli_query($enlace,$cadenaSQL);

	if(mysqli_affected_rows($enlace)>=1){

		$opcionsubseccion = mysqli_fetch_row($resultado);

		secciondevocional($opcionsubseccion[2],$opcionsubseccion[3],$opcionsubseccion[4],$opcionsubseccion[5],$opcionsubseccion[6],$opcionsubseccion[7],$opcionsubseccion[8],$opcionsubseccion[9]);

	}else{

		secciondevocional("","","","","","","","");

	}

?>
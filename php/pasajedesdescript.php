<?php
	
	include "../inc/conexion.php";

	$enlace = Conectarse();

	$dia = $_POST["dia"];
	$mes = $_POST["mes"];
	$year = $_POST["year"];

	$cadenaSQL = "SELECT DISTINCT libro FROM devocionales WHERE dia=$dia AND mes=$mes AND anual=$year ORDER BY libro";

	$resultado = mysqli_query($enlace,$cadenaSQL);

	if (mysqli_affected_rows($enlace)>=1){

		while($libro = mysqli_fetch_row($resultado))
		{
			$result1 = mysqli_query($enlace,"SELECT nomlibro FROM libros Where idlibro=".$libro[0]);
			$row1 = mysqli_fetch_row($result1);
			$result2 = mysqli_query($enlace,"SELECT capitulo, versiculoini, versiculofin, iddevocional FROM devocionales WHERE dia=$dia AND mes=$mes AND anual=$year AND libro=".$libro[0]." ORDER BY libro");
			while($row =mysqli_fetch_row($result2))
			{
				if($row[1]==$row[2]){
					$referencia = utf8_encode($row1[0]).", ".$row[0].":".$row[1];
				}else{
					$referencia = utf8_encode($row1[0]).", ".$row[0].": ".$row[1]." - ".$row[2];
				}
				echo "<h2>".$referencia."</h2>";
				echo "<input type='hidden' id='txtiddevocional' name='txtiddevocional' value=".$row[3]." />";
				for ($i=$row[1]; $i <=$row[2] ; $i++) { 
					$cadenaSQL = "SELECT escritura FROM escrituras WHERE idlibro = ".$libro[0]." AND capitulo = ".$row[0]." AND versiculo = ".$i;
					$resultver = mysqli_query($enlace,$cadenaSQL);
					$filaver = mysqli_fetch_row($resultver);
					echo "<p class='referencia'>[".$row[0].":".$i."]</p>";
					echo "<p class='texto'>".utf8_decode($filaver[0])."</p>";
				}
			}
			echo "<hr>";
		}

	}else{
		echo "<h2>Fecha sin pasaje programado</h2>";
		echo "<p class='texto'>No se ha programado pasajes biblicos para esta fecha</p>";
	}

?>

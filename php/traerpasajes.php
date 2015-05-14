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
			$result2 = mysqli_query($enlace,"SELECT d.iddevocional, d.capitulo, d.versiculoini, d.versiculofin, e.escritura FROM devocionales AS d, escrituras AS e WHERE e.capitulo=d.capitulo AND e.versiculo=d.versiculo AND e.idlibro=".$libro[0]." AND d.dia=$dia AND d.mes=$mes AND d.anual=$year AND d.libro=".$libro[0]);
			while($row2=mysqli_fetch_row($result2)){
				$pasaje = "<option value='".$row[0]."'>";
				if($row[2]==$row[3]){
					$pasaje .= utf8_encode($row1[0]).", ".$row[1].":".$row[2];	
				}else{
					$pasaje .= utf8_encode($row1[0]).", ".$row[1].":".$row[2]."-".$row[3];
				}
				$pasaje .= "</option>";
				echo $pasaje;
			}
		}

	}else{
		echo "<option value='0'>Pasajes correspondientes a la fecha seleccionada</option>";
	}

?>
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
			$result2 = mysqli_query($enlace,"SELECT iddevocional, capitulo, versiculoini, versiculofin FROM devocionales WHERE dia=$dia AND mes=$mes AND anual=$year AND libro=".$libro[0]." ORDER BY libro");
			while($row2=mysqli_fetch_row($result2)){
				$pasaje = "<option value='".$row[0]."'>";
				if($row2[2]==$row2[3]){
					$pasaje .= utf8_encode($row1[0]).", ".$row2[1].": ".$row2[2];	
				}else{
					$pasaje .= utf8_encode($row1[0]).", ".$row2[1].":".$row2[2]."-".$row2[3];
				}
				$pasaje .= "</option>";
				echo $pasaje;
			}
		}

	}else{
		echo "<option value='0'>Pasajes correspondientes a la fecha seleccionada</option>";
	}

?>
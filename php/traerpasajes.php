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
			$result2 = mysqli_query($enlace,"SELECT d.capitulo, d.versiculo, e.escritura FROM devocionales AS d, escrituras AS e WHERE e.capitulo=d.capitulo AND e.versiculo=d.versiculo AND e.idlibro=".$libro[0]." AND d.dia=$dia AND d.mes=$mes AND d.anual=$year AND d.libro=".$libro[0]);
			$row=mysqli_fetch_row($result2);
			$primero = $row[1];
			$result3 = mysqli_query($enlace,"SELECT d.capitulo, d.versiculo, e.escritura FROM devocionales AS d, escrituras AS e WHERE e.capitulo=d.capitulo AND e.versiculo=d.versiculo AND e.idlibro=".$libro[0]." AND d.dia=$dia AND d.mes=$mes AND d.anual=$year AND d.libro=".$libro[0]." ORDER BY d.capitulo, d.versiculo DESC LIMIT 1");
			$row3=mysqli_fetch_row($result3);
			$capitulo = $row3[0];
			$ultimo = $row3[1];
			$pasaje = "<option value=''>";
			$pasaje .= utf8_encode($row1[0]).", ".$capitulo.":".$primero."-".$ultimo;
			$pasaje .= "</option>";
			echo $pasaje;
		}

	}else{
		echo "<option value='0'>Pasajes correspondientes a la fecha seleccionada</option>";
	}

?>
<?php
	
	$enlace = Conectarse();

	$dia = $diaactual;
	$mes = $mesactual;
	$year = $añoactual;

	$cadenaSQL = "SELECT DISTINCT libro FROM devocionales WHERE dia=$dia AND mes=$mes AND anual=$year ORDER BY libro";

	$resultado = mysqli_query($enlace,$cadenaSQL);

	if (mysqli_affected_rows($enlace)>=1){

		while($libro = mysqli_fetch_row($resultado))
		{
			$result1 = mysqli_query($enlace,"SELECT nomlibro FROM libros Where idlibro=".$libro[0]);
			$row1 = mysqli_fetch_row($result1);
			echo "<h2>".utf8_encode($row1[0])."</h2>";
			$result2 = mysqli_query($enlace,"SELECT d.capitulo, d.versiculo, e.escritura FROM devocionales AS d, escrituras AS e WHERE e.capitulo=d.capitulo AND e.versiculo=d.versiculo AND e.idlibro=".$libro[0]." AND d.dia=$dia AND d.mes=$mes AND d.anual=$year AND d.libro=".$libro[0]);
			while($row =mysqli_fetch_row($result2))
			{
				echo "<p class='referencia'>[".$row[0].":".$row[1]."]</p>";
				echo "<p class='texto'>".utf8_decode($row[2])."</p>";
			}
			echo "<hr>";
		}

	}else{
		echo "<h2>Fecha sin pasaje programado</h2>";
		echo "<p class='texto'>No se ha programado pasajes biblicos para esta fecha</p>";
	}

?>

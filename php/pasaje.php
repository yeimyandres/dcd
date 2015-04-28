<?php
	
	$enlace = Conectarse();

	$dia = $diaactual;
	$mes = $mesactual;
	$año = $añoactual;

	$resultado = mysqli_query($enlace,"SELECT DISTINCT libro FROM devocionales WHERE dia=$dia AND mes=$mes AND year=$año");
	while($libro=mysqli_fetch_row($resultado))
	{
		$result1 = mysqli_query($enlace,"SELECT nomlibro FROM libros Where idlibro=".$libro[0]);
		$row1 = mysqli_fetch_row($result1);
		echo "<h2>".utf8_encode($row1[0])."</h2>";
		$result2 = mysqli_query($enlace,"SELECT d.capitulo, d.versiculo, e.escritura FROM devocionales AS d, escrituras AS e WHERE e.capitulo=d.capitulo AND e.versiculo=d.versiculo AND e.idlibro=".$libro[0]." AND d.dia=$dia AND d.mes=$mes AND d.year=$año AND d.libro=".$libro[0]);
		while($row =mysqli_fetch_row($result2))
		{
			echo "<p class='referencia'>[".$row[0].":".$row[1]."]</p>";
			echo "<p class='texto'>".utf8_decode($row[2])."</p>";
		}
		echo "<hr>";
	}

?>


<!--<h2>Juan 3:16-18</h2>
<p class="referencia">16</p>
<p class="texto">
	Porque de tal manera amó Dios al mundo, que ha dado a su Hijo unigénito,
	para que todo aquel que en él cree, no se pierda, mas tenga vida eterna.
</p>
<p class="referencia">17</p>
<p class="texto">
	Porque no envió Dios a su Hijo al mundo para condenar al mundo, sino para
	que el mundo sea salvo por él.
</p>
<p class="referencia">18</p>
<p class="texto">
	El que en él cree, no es condenado; pero el que no cree, ya ha sido condenado,
	porque no ha creído en el nombre del unigénito Hijo de Dios.
</p>-->
<?php
	
	$enlace = Conectarse();

	$dia = $diaactual;
	$mes = $mesactual;
	$año = $añoactual;

	$resultado = mysqli_query($enlace,"SELECT DISTINCT libro FROM devocionales WHERE dia=$dia AND mes=$mes AND año=$año");
	while(mysqli_fetch_row($resultado))
	{
		$row =mysqli_fetch_row($result1);
		echo "Capitulo: ".$row[0]." - ";
		echo "Versiculo: ".$row[1];
		echo "<br>";
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
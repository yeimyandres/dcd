<?php

	$diaactual = date("j");
	$mesactual = date("n");
	$añoactual = date("Y");
	$meses = array("0","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

?>

<ul>
	<li class="principal">
		<a class="botonaños"><?php echo $añoactual; ?></a>
	</li>
	<?php

	for ($i=$añoactual; $i < $añoactual+3; $i++) { 
		echo "<li class='secundario secaños'><a class='selectoraño' id='$i'>$i</a></li>";
	}

	?>
	<li class="principal">
		<a class="botonmeses"><?php echo $meses[$mesactual]; ?></a>
	</li>
	<?php

	for ($i=1; $i <= 12; $i++) { 
		echo "<li class='secundario secmeses'><a class='selectormes' id='$i'>".$meses[$i]."</a></li>";
	}

	?>
</ul>
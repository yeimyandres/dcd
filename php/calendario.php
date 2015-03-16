<?php

	$diasmesactual = date("t");
	$diainicial = date("w", mktime(0,0,0,$mesactual,1,$añoactual));
	echo "<table>";
	echo "<tr>";
	echo "<th>Dom</th>";
	echo "<th>Lun</th>";
	echo "<th>Mar</th>";
	echo "<th>Mie</th>";
	echo "<th>Jue</th>";
	echo "<th>Vie</th>";
	echo "<th>Sab</th>";
	echo "</tr>";
	for ($i=1; $i <= $diasmesactual; $i++){ 
		if($i==$diaactual){
			$clase = "diaactual";
		}else{
			if((date("w", mktime(0,0,0,$mesactual,$i,$añoactual)))==0){
				$clase = "domingo";
			}else{
				$clase = "normal";
			}
		}
		if($i==1){
			echo "<tr>";
			if($diainicial==0){
				echo "<td class='opciondia $clase'>$i</td>";
			}else{
				for ($j=0; $j < $diainicial; $j++){ 
					echo "<td></td>";
				}
				echo "<td class='opciondia $clase'>$i</td>";
			}
		}else{
			echo "<td class='opciondia $clase'>$i</td>";
			if((date("w", mktime(0,0,0,$mesactual,$i,$añoactual)))==6){
				echo "</tr>";
				if($i<$diasmesactual){
					echo "<tr>";
				}
			}
		}
	}
	echo "</tr></table>";

	echo "<div id='fechaactual'><b>Fecha Actual Seleccionada:</b><div id='mifecha'>".date("j")." de ".$meses[date("n")]." de ".date("Y")."</div></div>";

?>
<?php
	function Conectarse(){
		$enlace = mysqli_connect("localhost","webproco_dcd","iccfyeian3ag","webproco_dcd");
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}else{
			return $enlace;
		}
	}
?>
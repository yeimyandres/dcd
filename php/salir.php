<?php

session_start();
	if (isset($_SESSION['IdUsuario']))
	{
		session_unset();
		session_destroy();
	}

    echo "<script language=javascript>";
    
	echo "alert('Sesión cerrada exitosamente !\\n\\nWEBPro Soluciones...!');";
//	echo "window.location='index.php';";
//    echo "window.load('index.php');";
    echo "top.location.href='../';"; 
	echo "</script>";

?>
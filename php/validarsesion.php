﻿<?phpinclude '../inc/conexion.php';//iniciar sesión para el  usuariosession_start();//función para almacenar datos de sesiónfunction iniciarSesion($idusuario,$nomusuario,$rolusuario,$imagenusuario){			$_SESSION['Id'] = session_id();	$_SESSION['IdUsuario']=$idusuario;	$_SESSION['NombreUsuario']=$nomusuario;	$_SESSION['RolUsuario']=$rolusuario;	$_SESSION['ImagenUsuario']=$imagenusuario;			//llamado a pagina inicio.php	echo "<script language=javascript>";	echo "window.location='../inicio.php';";	echo "</script>";				}	//recibe datos usuario y clave	$usuario = $_POST['txtusuarioi'];$clave = md5($_POST['txtclavei']);	//Validar que el usuario y contraseña sean validos (registrados en la base de datos)	$link = Conectarse();	    $result=mysqli_query($link,"SELECT idusuario, nombreusuario, rolusuario, fotousuario FROM usuarios WHERE idusuario='".$usuario."' AND claveusuario='".$clave."' AND estado='A'");    if (mysqli_num_rows($result)==1)	{		$row=mysqli_fetch_row($result);		//usuario y contraseña existen        //envia datos de usuario para almacenar en sesión		iniciarSesion($row[0], $row[1], $row[2], $row[3]);	}	else	{//usuario o contraseña no existen. vuelve a pagina de inicio (index.php)            echo "<script language=javascript>";			echo "alert('El nombre de usuario o la contraseña no existe!');";			echo "window.location='../';";			echo "</script>";	}?>
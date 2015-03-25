<?php
	function Conectarse(){
		if (!($link=mysql_connect("localhost","webproco_dcd","iccfyeian3ag"))){
			exit();
		}
		if (!mysql_select_db("webproco_dcd",$link)){
			exit();
		}
		return $link;
	}
?>
<?php
	if($_SESSION["logado"] == 0){
		if(isset($_COOKIE["username"]) && isset($_COOKIE["senha"])){
			echo "<script>logarAuto('".$_COOKIE['username']."', '".$_COOKIE['senha']."');</script>";
		}
	}
?>


<?php
	session_start();
	$_SESSION["pagina"] = null;
	$pagina = str_replace("!", "&", $_GET["url"]);
	header("location: ".$pagina);
?>
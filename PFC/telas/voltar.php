<!--Tela que volta para a pagina anterior-->
<?php
	session_start();
	$pagina = $_SESSION["pagina"];

	$_SESSION["pagina"] = null;

	header("location: ".$pagina);

				
	
?>
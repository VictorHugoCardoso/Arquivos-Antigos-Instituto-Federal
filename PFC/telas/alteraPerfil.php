<?php
	session_start();
	require_once "../controller/ControllerUsuario.php";

	$cUs = new ControllerUsuario();
	$usr = $cUs->consultarPorId($_SESSION["id"]);


	include_once "../html/formularios/formalteraperfil.html";
?>

 
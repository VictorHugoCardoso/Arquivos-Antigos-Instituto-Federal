<!--Tela que mostra a tela de mensagens -->

<?php 
	set_include_path ("/var/www/PFC");
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<?php
		include_once "../html/head.html";
		session_start();

		echo "<script></script>";
	?>
	<body> 

	<div id="cinzatransp" align="center">
		<div id="divmsginv" >
		</div>
	</div>
		<?php
		if (isset($_SESSION["logado"])){
			if ($_SESSION["logado"] == 1){
				include_once "../html/fadelogin.html";
				include_once "../html/loginbar.html";
				include_once "../html/logo.html";
				include_once "../html/menu.html";
				include_once "mostraMensagem.php";
				include_once "../html/rodape.html";	
			}else{
				echo "<script>negaPermissao();</script>";
			}
		}
		?>
	</body>
</html>

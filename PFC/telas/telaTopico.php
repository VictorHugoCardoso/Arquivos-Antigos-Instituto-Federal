<!--Tela que combina mostra os topicos de um assunto para o usuario-->
<?php 
	set_include_path ("/var/www/PFC");
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<?php
		include_once "../html/head.html";
		session_start();
	?>
	
	<body>
		<?php 
			include_once "../html/fadelogin.html";
		?>   
		<?php
			include_once "../html/loginbar.html";
		?>	

		<?php
			include_once "../html/logo.html";
		?>
		
		<?php
			include_once "../html/menu.html";
		?>
		
		<?php
			
			include_once "mostraTopico.php";

		?>
		</div>
		<?php
			include_once "../html/rodape.html"
		?>
		</body>
</html>

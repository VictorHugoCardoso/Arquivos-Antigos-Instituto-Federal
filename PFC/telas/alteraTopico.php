<!--Pagina usada para alterar um topico-->
<!DOCTYPE HTML>
<html lang="pt-br">
<?php session_start(); ?>
	<?php
		include_once "../html/head.html";
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
			include_once "../html/formularios/formalteratopico.php";
		?>
		<?php
			include_once "../html/rodape.html"
		?>
		</body>

</html>

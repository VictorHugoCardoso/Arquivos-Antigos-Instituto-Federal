<!--Pagina usada para alterar um assunto-->
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
			include_once "../html/formularios/formalteraassunto.php";
		?>
		<?php
			include_once "../html/rodape.html"
		?>
		</body>

</html>

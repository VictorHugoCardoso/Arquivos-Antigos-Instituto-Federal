<!--Pagina usada para alterar um post-->
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
		<script>
			$('document').ready(function(){
				alteraFaq1(<?php echo $_GET["id"];?>);
			});
		</script>
		<div class='box80'>
		</div>
		<?php
			include_once "../html/rodape.html"
		?>
		</body>

</html>

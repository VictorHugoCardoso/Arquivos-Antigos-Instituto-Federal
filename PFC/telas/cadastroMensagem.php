<!--Tela para cadastro de Mensagem-->
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
			if(isset($_GET["titulo"]) && isset($_GET["user"])){
				include_once "../html/formularios/formrespostamensagem.html";
			}else{
				echo "<script>geraSelectMsg();</script>";
				include_once "../html/formularios/formcadastromensagem.html";
			}
		?>
		<?php
			include_once "../html/rodape.html"
		?>
	</body>
</html>

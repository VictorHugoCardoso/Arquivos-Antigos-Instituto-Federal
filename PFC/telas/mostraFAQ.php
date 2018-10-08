
<div class="box80">
	<?php
		if (($_SESSION["logado"] == 1)&&($_SESSION["tipousr"] == 0)) {
			echo '<a href="./cadastroFAQ.php" class="right"><button class="submit botaofaq">Nova Pergunta</button></a>';
		}
	?>
	<div class="caixinhatop titulo">
		
	<span class="titulotexto">Perguntas Frequentes</span>
	 	
	</div>
	<?php

		$server = $_SERVER['SERVER_NAME']; 
		$endereco = $_SERVER ['REQUEST_URI'];

		$pagina = "http://" . $server . $endereco;
		$_SESSION["pagina"] = $pagina;

	?>

	<?php require_once "../controller/ControllerFaq.php";?>

</div>

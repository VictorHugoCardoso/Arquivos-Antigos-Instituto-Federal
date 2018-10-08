<!--Tela que combina o banco de dados com a pagina html que mostra as informacoes, incluida em telaPost.php-->

<div class="box80">
	<?php

		$server = $_SERVER['SERVER_NAME']; 
		$endereco = $_SERVER ['REQUEST_URI'];

		$pagina = "http://" . $server . $endereco;
		$_SESSION["pagina"] = $pagina;

	?>
	<?php require_once "../controller/ControllerPost.php";?>
</div>



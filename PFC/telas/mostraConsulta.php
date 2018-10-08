
<div class="box80">
	
	<div class="caixinhatop titulo">
		
	<span class="titulotexto">Consulta</span>
	 	
	</div>
	<?php

		$server = $_SERVER['SERVER_NAME']; 
		$endereco = $_SERVER ['REQUEST_URI'];

		$pagina = "http://" . $server . $endereco;
		$_SESSION["pagina"] = $pagina;

	?>

	<?php include_once "../html/formularios/formconsulta.html";?>

</div>

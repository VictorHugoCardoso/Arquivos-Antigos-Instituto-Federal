<!--Tela que combina o banco de dados com a pagina html que mostra as informacoes, incluida em telaTopico.php-->

<div class="box80 fundotop">
	
<?php 
	$server = $_SERVER['SERVER_NAME']; 
	$endereco = $_SERVER ['REQUEST_URI'];

	$pagina = "http://" . $server . $endereco;
	$_SESSION["pagina"] = $pagina;
			
require_once "../controller/ControllerTopico.php"; 

?>

</div>

</div>
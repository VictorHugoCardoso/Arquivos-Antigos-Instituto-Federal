<!--pagina inicial do site-->
<!DOCTYPE HTML>
<html lang="pt-br">
	<?php
		include_once "../html/head.html";
		session_start();

		$server = $_SERVER['SERVER_NAME']; 
		$endereco = $_SERVER ['REQUEST_URI'];

		$pagina = "http://" . $server . $endereco;
		$_SESSION["pagina"] = $pagina;

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
		<div class="box80">
			<?php
				include_once "../telas/mostraAssunto.php";
			?>
		</div>
		<?php
			include_once "../html/rodape.html"
		?>
	</body>
	</html>

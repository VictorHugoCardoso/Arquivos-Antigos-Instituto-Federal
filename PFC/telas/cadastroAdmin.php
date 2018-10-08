<!--Tela para cadastro de Administrador-->
<!DOCTYPE HTML>
<html lang="pt-br">
	<?php
		include_once "../html/head.html";
		session_start();
	?>
	
	<body>
		<?php
			if (isset($_SESSION["logado"])){
				if ($_SESSION["logado"] == 1){
					if($_SESSION["tipousr"] == 0){
						include_once "../html/fadelogin.html";
						include_once "../html/loginbar.html";
						include_once "../html/logo.html";
						include_once "../html/menu.html";
						include_once "../html/formularios/formcadastroadmin.html";
						include_once "../html/rodape.html";
					}else{
						echo "<script>negaPermissao();</script>";
					}	
				}else{
					echo "<script>negaPermissao();</script>";
				}
			}
		?>
	</body>
</html>

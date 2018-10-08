<!--Tela que combina msotra as funcionalidades do ADM-->
<?php 
	set_include_path ("/var/www/PFC");
?>

<!DOCTYPE HTML>

<?php
	include_once "../html/head.html";
	session_start();
?>

<html lang="pt-br">
	<body>
	<?php
		if (isset($_SESSION["logado"])){
			if ($_SESSION["logado"] == 1){
				if($_SESSION["tipousr"] == 0){
					include_once "../html/fadelogin.html";
					include_once "../html/loginbar.html";
					include_once "../html/logo.html";
					include_once "../html/menu.html";
					include_once "mostraPainelAdm.php";
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

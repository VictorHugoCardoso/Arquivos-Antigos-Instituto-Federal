<!--Tela que realiza logout do usuario logado, acessado pela loginbar-logado-->
<?php
	
	session_start();
	session_destroy();
	setcookie("username" , null);
	setcookie("senha" , null);
	sleep(1);

	header("location: index.php");

?>

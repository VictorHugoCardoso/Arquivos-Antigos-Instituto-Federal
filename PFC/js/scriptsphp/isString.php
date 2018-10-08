<?php
	if(ctype_alpha(str_replace(" ", "",$_POST["texto"]))){
		echo trim($_POST["texto"]);
	}else{
		echo "Caracteres invalidos";
	}
?>
<?php
	$server = $_SERVER['SERVER_NAME']; 
	$endereco = $_SERVER ['REQUEST_URI'];

	$pagina = "http://" . $server . $endereco;
	$_SESSION["pagina"] = $pagina;
?>

<div class="box80">
	

	<div class="caixinhatop titulo">
		
		<span class="titulotexto">Caixa de Entrada</span>
		
	</div>
	<div class="menumensagem" align="center">
		<ul>
			<a href="telaMensagem.php?acao=listarRecebidas"><li class="itemMenu2">Caixa de Entrada</li></a>
			<a href="telaMensagem.php?acao=listarEnviadas"><li class="itemMenu2">Enviadas</li></a>
			<a href="telaMensagem.php?acao=listarExcluidas"><li class="itemMenu2">Excluidas</li></a>
			<a href="cadastroMensagem.php"><li class="itemMenu2">Nova Mensagem</li></a>
		</ul>
	</div>

	<div id="caixaMsg" class="caixaMsg"><?php require_once "../controller/ControllerMensagem.php"; ?></div>
	<?php 

	 if($_GET["acao"] != "listarExcluidas"){ 
		echo '<div id="botoesMsg" class="caixaMsg"><div class="divbotoesMsg"><input style="margin-left: 6px" type="checkbox" id="marcarMsg"><span id="marcarTodas">Marcar Todas</span>
		<br><button style="width: 140;;" class="submit3" id="excluirTudo">Excluir Selecionadas</button><br><br></div></div>';
	 }else{
	 	echo '<div id="botoesMsg" class="caixaMsg"><div class="divbotoesMsg"><input style="margin-left: 26px" type="checkbox" id="marcarMsg"><span id="marcarTodas">Marcar Todas</span>
	 	<br><button style="width: 160px;" class="submit3" id="restaurarTudo">Restaurar Selecionadas</button><br><br></div></div>';
	 }

	?>
</div>
	
</div>

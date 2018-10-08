<div class="box80">
	<div class="titulo reduzir">
		<span class="titulotexto">Alterar Post</span>
	</div>
	<form action="../controller/ControllerPost.php" enctype="multipart/form-data" method="POST">
		<div class="inlineblock divCadastroUsuario">
		<textarea class="textareaCadastro block" placeholder="Digite aqui seu post" id="post" name="texto" rows="10" cols="50"><?php echo trim(strip_tags($p->getTexto()));?></textarea>
			<div class="botao">
				<input class="submit" type="submit" value="Alterar">
				<a href="<?php echo $_SESSION["pagina"]; ?>"><input class="submit cancelar" type="button" value="Cancelar"></a>
				<input type="hidden" name="acao" value="alterar">
				<input type="hidden" name="id" value=<?php echo "'".$_GET["id"]."'" ?>>
			</div>
		</div>
		
	</form> 
</div>
<script>
	
</script>
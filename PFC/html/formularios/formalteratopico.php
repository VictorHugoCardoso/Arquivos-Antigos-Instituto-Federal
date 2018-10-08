<div class="box80">
	<div class="titulo reduzir">
		<span class="titulotexto">Alterar Tópico</span>
	</div>
	<form action="../controller/ControllerTopico.php" enctype="multipart/form-data" method="POST">
		<div class="inlineblock divCadastroUsuario">
			<input class="inputCadastro block clicktoenter" placeholder="Titulo" id="nome" type="text" name="titulo" value = <?php echo "'".$_GET["titulo"]."'"; ?> >
			<div class="botao">
				<input class="submit enterclick" type="submit" value="Alterar">
				<a href="<?php echo $_SESSION["pagina"]; ?>"><input class="submit cancelar" type="button" value="Cancelar"></a>
				<input type="hidden" name="acao" value="alterar">
				<input type="hidden" name="id" value=<?php echo "'".$_GET["id"]."'" ?>>
			</div>
		</div>
		
	</form>
</div>
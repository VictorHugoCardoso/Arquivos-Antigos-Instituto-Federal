
<div class="box80">
	<div class="titulo reduzir">
		<span class="titulotexto">Alterar Assunto</span>
	</div>
	<form action="../controller/ControllerAssunto.php" enctype="multipart/form-data" method="POST">
		<div class="inlineblock divCadastroUsuario">
		<input class="inputCadastro block clicktoenter" placeholder="Titulo" id="nome" type="text" name="titulo" value = <?php echo "'".$_GET["titulo"]."'"; ?> >
		<input class="inputCadastro block clicktoenter" placeholder="Descricao" id="descricao" type="text" name="descricao" value = <?php echo "'".$_GET["descricao"]."'"; ?>>
		<input class="inputCadastro block clicktoenter" placeholder="Grupo" id="grupo" type="text" name="grupo" value = <?php echo "'".$_GET["grupo"]."'"; ?>>
			<div class="botao">
				<input class="submit enterclick" type="submit" value="Alterar">
				<a href="<?php echo $_SESSION["pagina"]; ?>"><input class="submit cancelar" type="button" value="Cancelar"></a>
				<input type="hidden" name="acao" value="alterar2">
				<input type="hidden" name="icone" value = <?php echo "'".$_GET["icone"]."'"; ?>>
				<input type="hidden" name="id" value=<?php echo "'".$_GET["id"]."'" ?>>
			</div>
		</div>
		
	</form>
</div> 
<div class="titulo">

		<span class="titulotexto"><?php echo $topico->getTitulo(); ?>
		<a href="../telas/telaTopico.php?acao=listar&idassunto=<?php echo $topico->getId_assunto();?>" title="Voltar" class="voltar"><img src="../imagens/voltar.png"></a>
		<?php 
			
			if (($_SESSION["logado"] == 1)&&($topico->getAtivo() == 1)) {
				echo "<a  href='../telas/cadastroPost.php?id=".$_GET["id"]."&nome=".$topico->getTitulo()."'><button class='submit icone'>Responder</button></a>";
			}else if(($_SESSION["logado"] == 0)&&($topico->getAtivo() == 1)){
				echo "<button class='login icone right submit2'>Faça login para responder</button>";
			}else if(($_SESSION["logado"] == 1)&&($topico->getAtivo() == 0)){
				echo "<a href='' class='right'><button class='submit2 icone'>Topico Encerrado</button></a>";
			}
			
		?>
		</span>
	</div>



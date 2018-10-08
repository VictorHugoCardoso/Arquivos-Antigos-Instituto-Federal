<div class="titdescusr">Visao Geral</div>
<div class="textousr left">
	<span class="block txtdescusr"> <span class="bold"> Data de nascimento: </span> </span>
	<span class="block txtdescusr"> <span class="bold"> E-mail: </span> </span>
	<span class="block txtdescusr"> <span class="bold"> Tipo: </span> </span>
	<span class="block txtdescusr"> <span class="bold"> Idade: </span> </span>
	<span class="block txtdescusr"> <span class="bold"> Posts: </span> </span>
	<span class="block txtdescusr"> <span class="bold"> Sexo: </span> </span>
	<span class="block txtdescusr"> <span class="bold"> Localidade: </span></span>

</div>
<div class="textousr2 left">
	<span class="block txtdescusr">					
		<?php
			if ($usr->getDtNasc() == "Não informada"){
				echo $usr->getDtNasc();
			}else{
				$vet = explode('-',$usr->getDtNasc());
				echo $vet[2].'/'.$vet[1].'/'.$vet[0];
			}
			
		?>
	</span>

	<span class="block txtdescusr">					
		<?php
			echo $usr->getEmail();
		?>
	</span>

	<span class="block txtdescusr">					
		<?php
			if ($usr->getTipo() == 0){
				echo "Administrador";
			}else if ($usr->getTipo() == 1){
				echo "Usuario";
			}else if($usr->getTipo() == 2){
				echo "Moderador";
			}
		?>
	</span>
	<span class="block txtdescusr">
		<?php
		if ($usr->getDtNasc() == "Não informada"){
			echo "Desconhecida";
		}else{
			$vet = explode('-',$usr->getDtNasc());
			$idade = date("Y") - $vet[0];
			echo $idade. " anos";
		}?>
	</span>
	<span class="block txtdescusr">						
		<?php echo $usr->getQtdPosts();?> posts
	</span>
	<span class="block txtdescusr">
		<?php
			if ($usr->getSexo() == "M"){
				echo "Masculino";
			}else if ($usr->getSexo() == "F"){
				echo "Feminino";
			}else if($usr->getSexo() == "N"){
				echo "Nao informado";
			}
		?>
	</span>
	<span class="block txtdescusr">
		<?php 
			echo $usr->getLocalidade();
		?>
	</span>
</div>
<div class="resumousr left">
	<?php 
		$t = $usr->getResumo();
		$t = nl2br($t);
		$vet = explode("<br />", $t);
		foreach ($vet as $t){
			echo "<p class='txtpost'>".$t."</p>";
		}
	?>
</div>
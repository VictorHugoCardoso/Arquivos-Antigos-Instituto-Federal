<!--Tela que combina o banco de dados com a pagina html que mostra as informacoes, incluida em index.php-->
<?php
require_once "../controller/ControllerAssunto.php";
$cAs = new ControllerAssunto();

$vetAs = $cAs->consultar();
$atual = "";
$cont = 0;
if(!$vetAs == null){
	foreach ($vetAs as $as){
		if($as->getGrupo() != $atual){
			if($cont != 0){
				echo "</div>";
			}
			$atual = $as->getGrupo();
			include "../html/tituloAssunto.html";
			$cont = $cont +1;
		}
		$qtdtop = $cAs->getQtdTopicos($as->getId());
		$qtdpost = $cAs->getQtdPost($as->getId());
		$titulo = $cAs->getLastTopico($as->getId());
		include "../html/listadeassuntos.html";
		
	}
}
echo"</div>";
?>
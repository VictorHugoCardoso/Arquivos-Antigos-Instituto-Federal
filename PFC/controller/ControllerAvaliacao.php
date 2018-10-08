<?php

	require_once "../dao/DaoAvaliacao.php";

	session_start();

	$post = new ControllerAvaliacao();

	class ControllerAvaliacao{

		function __construct(){

			if(isset($_POST["acao"])){
				$acao = $_POST["acao"];
			}else{
				$acao = $_GET["acao"];
			}
			
			if(isset($acao)){
				$this->processarAcao($acao);
			}else{
				echo"Nenhuma ação a ser processada.";
			}
		}

		public function processarAcao($acao){
			if($acao == "avaliar"){
				$this->avaliar();
			}
		}

		public function avaliar(){
			$DaoA = new DaoAvaliacao();

			$idpost = $_GET["idpost"];
			$idavaliado = $_GET["idusuario"];
			$idusuario = $_SESSION["id"];

			$av = $DaoA->consultar($idpost,$idusuario);
			var_dump($av);

			if (!isset($av)){
				$DaoA->inserir($idpost,$idusuario,$idavaliado);
				echo "inserir";
			}else{
				$DaoA->excluir($idpost,$idusuario);
				echo "excluir";
			}

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			header("location: ". $pagina);
		}
	}


?>
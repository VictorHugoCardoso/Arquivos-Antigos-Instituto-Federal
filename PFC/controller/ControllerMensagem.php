<?php

	require_once "../dao/DaoMensagem.php";
	require_once "../dao/DaoUsuario.php";
	require_once "../beans/Mensagem.php";

	$msg = new ControllerMensagem();

	class ControllerMensagem{

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
			if($acao == "cadastrar"){
				$this->cadastrar();
			}else if($acao == "listarRecebidas"){
				$this->listarRecebidas();
			}else if($acao == "listarEnviadas"){
				$this->listarEnviadas();
			}else if($acao == "excluirRecebido"){
				$this->excluirRecebido();
			}else if($acao == "excluirEnviadas"){
				$this->excluirEnviadas();
			}else if($acao == "consultaVisualizadas"){
				$this->consultaVisualizadas();
			}else if($acao == "visualizar"){
				$this->visualizar();
			}else if($acao == "listarExcluidas"){
				$this->listarExcluidas();
			}else if($acao == "restaurarMensagem"){
				$this->restaurarMensagem();
			}else if($acao == "consultaPorTitulo"){
				$this->consultaPorTitulo();
			}
		}

		public function consultaPorTitulo(){
			session_start();
			$titulo = trim($_POST["titulo"]);
			$daoM = new DaoMensagem();
			$vet = $daoM->consultarPorTitulo($titulo, $_SESSION["id"]);
			echo "<div class='titulomsg'>".$vet[0]->getTitulo()."</div>";
			echo "<div class='overflow'>";
			foreach ($vet as $msg){
				include "../html/listamensagemtitulo.html";
			}
			echo "</div>";
		}

		public function cadastrar(){
			session_start();

			$DaoM = new DaoMensagem();
			$mensagem = new Mensagem();
			$DaoU = new DaoUsuario();

			$mensagem->setTexto($_POST["texto"]);
			$mensagem->setTitulo($_POST["titulo"]);
			$mensagem->setId_Envio($_SESSION["id"]);
			$mensagem->setId_Destino($DaoU->consultaUsername($_POST["nomeUserDestino"]));
			$mensagem->setDataenvio(date("Y-m-d H:i:s"));
			
			if($DaoU->consultaUsername($_POST["nomeUserDestino"]) == $_SESSION["id"]){ 
				echo "erro"; 
			}else{
				$DaoM->inserir($mensagem);
			}
		}

		public function listarRecebidas(){
			$DaoM = new DaoMensagem();
			$DaoU = new DaoUsuario();

			$vetMensagens = $DaoM->consultarDestino($_SESSION["id"]);
			if(isset($vetMensagens)){
				foreach($vetMensagens as $vetMsg){
					if($vetMsg->getDestinoAtivo() == 1){
						include "../html/listademensagensRecebidas.html";
					}
				}
			}
		}

		public function listarEnviadas(){
			$DaoM = new DaoMensagem();
			$DaoU = new DaoUsuario();

			$vetMensagens = $DaoM->consultarEnvio($_SESSION["id"]);
			if(isset($vetMensagens)){
				foreach($vetMensagens as $vetMsg){
					if($vetMsg->getEnvioAtivo() == 1){
						include "../html/listademensagensEnviadas.html";
					}
				}
			}
		}

		public function listarExcluidas(){
			$DaoM = new DaoMensagem();
			$DaoU = new DaoUsuario();

			$vetMensagens = $DaoM->consultarExcluidas($_SESSION["id"]);

			if(isset($vetMensagens)){
				foreach($vetMensagens as $vetMsg){
					include "../html/listademensagensExcluidas.html";
				}
			}
		}

		public function excluirRecebido(){
			session_start();
			$DaoM = new DaoMensagem();

			$DaoM->excluirDestino($_POST["idMsg"],$_SESSION['id']);	
		}

		public function restaurarMensagem(){
			session_start();
			$DaoM = new DaoMensagem();
			
			$DaoM->restaurar($_SESSION["id"], $_POST["idMsg"]);	
		}

		public function excluirEnviadas(){
			session_start();
			$DaoM = new DaoMensagem();

			$DaoM->excluirEnvio($_POST["idMsg"], $_SESSION["id"]);	
		}

		public function consultaVisualizadas(){
			session_start();
			$DaoM = new DaoMensagem();

			$numero = $DaoM->consultaVisualizadas($_SESSION["id"]);
			
			if(isset($numero)){
				echo $numero;
			}
		}
		
		public function visualizar(){
			session_start();
			$DaoM = new DaoMensagem();
			
			$DaoM->visualizei($_SESSION["id"],$_POST["idmensagem"]);
			
		}
	}


?>

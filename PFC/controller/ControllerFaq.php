<?php

	require_once"../dao/DaoFaq.php";
	require_once"../beans/Faq.php";
	
	
	$faq = new ControllerFaq();
	
	class ControllerFaq{ 
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
			}else if($acao == "listar"){
				$this->listar();
			}else if($acao == "excluir"){
				$this->excluir();
			}else if($acao == "alterar"){
				$this->alterar();
			}else if($acao == "consultarPorId"){
				$this->consultarPorId();
			}
		}

		public function listar(){
			$DaoFaq = new DaoFaq();

			$vetFaq = $DaoFaq->consultar();
			
			
			
			if (isset($vetFaq)) {
				foreach ($vetFaq as $faq){
					include "../html/listaFaq.html";
				}
			}
	
		}

		public function consultarPorId(){
			$DaoFaq = new DaoFaq();
			if(isset($_POST["id"])){
				$id = $_POST["id"];
			}else{
				$id = $_GET["id"];
			}
			$faq = $DaoFaq->consultarPorId($id);
			
			
			include "../html/formularios/formalterafaq.html";
	
		}

		public function cadastrar(){
			session_start();
			$faq = new Faq();
			$daoF = new DaoFaq();

			$faq->setPergunta($_POST["pergunta"]);
			$faq->setResposta($_POST["resposta"]);

			$daoF->inserir($faq);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			echo $pagina;

		}

		public function alterar(){
			session_start();
			$faq = new Faq();
			$daoF = new DaoFaq();

			$faq->setPergunta($_POST["pergunta"]);
			$faq->setResposta($_POST["resposta"]);

			$daoF->alterar($faq,$_POST["id"]);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			echo $pagina;
		}

		public function excluir(){
			session_start();
			$id = $_POST["id"];
			$daoF = new DaoFaq();
			$daoF->excluir($id);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			echo "excluir";
		}
	}
?>

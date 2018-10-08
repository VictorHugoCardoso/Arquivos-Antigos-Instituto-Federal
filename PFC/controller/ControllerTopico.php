<?php

	require_once"../dao/DaoTopico.php";
	require_once"../beans/Topico.php";
	require_once"../beans/Post.php";
	require_once"../dao/DaoPost.php";
	
	
	$topico = new ControllerTopico();
	
	class ControllerTopico{ 
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
				$this->consultar();
			}else if($acao == "excluir"){
				$this->excluir();
			}else if($acao == "alterar"){
				$this->alterar();
			}
		}

		public function consultar(){
			$DaoTopico = new DaoTopico();

			$vetTop = $DaoTopico->consultar($_GET["idassunto"]);
			echo "<div class='caixinhatop titulo'>";
			if (isset($_GET["nomeassunto"])){
				echo "<span class='titulotexto'>".$_GET["nomeassunto"];
			}else{
				echo "<span class='titulotexto'>".$vetTop[0]->getAssunto()->getNome();
			}
			
			if ($_SESSION["logado"] == 1) {
				echo "<a href='../telas/cadastroTopico.php?idassunto=".$_GET["idassunto"]."' class='href'><button class='submit icone'>Novo Topico</button></a>";
			}
			echo "</span>";
			echo "</div>";
			if (isset($vetTop)) {
				foreach ($vetTop as $topico){
					include "../html/listadetopicos.html";
				}
			}
			
			$_SESSION["nomeassunto"] = null;
			$_SESSION["idassunto"] = null;
		}

		public function cadastrar(){
			session_start();
			$topico = new Topico();
			$DaoT = new DaoTopico();
			$DaoP = new DaoPost();
			$post = new Post();

			if(isset($_POST["anonimo"])){
				$topico->setAnonimo("1");
			}else{
				$topico->setAnonimo("0");
			}

			$topico->setTitulo($_POST["titulo"]);
			$topico->setId_usuario($_SESSION["id"]);
			$topico->setDt_criacao(date("Y-m-d H:i:s"));
			$topico->setId_assunto($_POST["idassunto"]);

			$DaoT->inserir($topico);

			$idtopico = $DaoT->getLastId();

			$post->setTexto($_POST["texto"]);
			$post->setId_topico($idtopico);
			$post->setId_usuario($_SESSION["id"]);
			$post->setDt_criacao(date("Y-m-d H:i:s"));
			var_dump($post);
			$DaoP->inserir($post);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			header("location: ".$pagina);

		}

		public function alterar(){
			session_start();
			$topico = new Topico();
			$DaoT = new DaoTopico();

			$topico->setTitulo($_POST["titulo"]);
			$topico->setId($_POST["id"]);

			$DaoT->alterar($topico,$_SESSION["id"]);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			header("location: ".$pagina);
		}

		public function excluir(){
			session_start();
			$id = $_GET["id"];
			$daoT = new DaoTopico();
			$daoT->excluir($id);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			header("location: ".$pagina);
		}
	}
?>

<?php 

	require_once"../dao/DaoPost.php";
	require_once "../dao/DaoUsuario.php";
	require_once"../beans/Post.php";
	require_once "../dao/DaoAvaliacao.php";
	require_once "../dao/DaoTopico.php";
	require_once "../dao/DaoNotificacao.php";

	$post = new ControllerPost();

	class ControllerPost{

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
			}else if($acao == "listarposts"){
				$this->consultar();
			}else if($acao == "avaliar"){
				$this->avaliar();
			}else if($acao == "excluir"){
				$this->excluir();
			}else if($acao == "alterar"){
				$this->alterar();
			}else if($acao == "notificar"){
				$this->notificar();
			}
		}

		public function cadastrar(){
			$post = new Post();
			$DaoP = new DaoPost();
			session_start();

			$post->setTexto($_POST["texto"]);
			$post->setId_topico($_POST["id_topico"]);
			$post->setId_usuario($_SESSION["id"]);
			$post->setDt_criacao(date("Y-m-d H:i:s"));

			$res = $DaoP->inserir($post);

			// Cadastrar Notificacao
				$top = new Topico();
				$DaoT = new DaoTopico();
				$DaoN = new DaoNotificacao();
				$top = $DaoT->consultarPorId($_POST["id_topico"]);

				if($top->getId_usuario() == $_SESSION["id"]){
				}else{
					$result = $DaoN->consultarExistente($top->getId_usuario(),$_POST["id_topico"],$top->getTitulo());	
						if($result == false){
							$DaoN->inserir($top->getId_usuario(),$_POST["id_topico"],$top->getTitulo());
						}
				}
			// --

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;
			if ($res){
				echo $pagina;
			}else{
				echo "erro";
			}
		}

		public function consultar(){
			$post = new Post();
			$DaoP = new DaoPost();
			$DaoU = new DaoUsuario();
			$DaoA = new DaoAvaliacao();
			$DaoT = new DaoTopico();

			$vetPost = $DaoP->consultar($_GET["id"], $_GET["pag"]*10-10);
			$qtd = $DaoT->getVisualizacoes($_GET["id"]);
			$topico = $DaoT->consultarPorId($_GET["id"]);
			$DaoT->visualizar($qtd, $_GET["id"]);
			$qtdposts = $DaoT->getQtdPosts($_GET["id"]);
			include_once "../html/tituloTopico.php";
			$id1 = $vetPost[0]->getId_usuario();
			$c0 = 0;
			if (isset($vetPost)) {
				foreach ($vetPost as $post){
					$c0 = $c0 +1;
					$usr = $DaoU->consultaBasica($post->getId_usuario());
					

					include "../html/listadeposts.html";
				}
			}
			echo "<div class='divpaginas'>";
			$server = $_SERVER['SERVER_NAME']; 
			$endereco = $_SERVER ['REQUEST_URI'];
			$pagina = "http://" . $server . $endereco;

			$pag = strrpos($pagina, "pag=");
			$pag = substr($pagina, $pag+4);
			
			for($i = 1; $i<($qtdposts/10+1);$i++){
				$paginax = str_replace("pag=".$pag, "pag=".$i, $pagina);
				echo"<a href='".$paginax."' >
				<button class='pagina left'>".$i."</button>
				</a>
					<div class='divpagina left'></div>";

			}
			echo "</div>";
			
			
		}

		public function alterar(){
			session_start();
			$post = new Post();
			$DaoP = new DaoPost();

			$post->setTexto($_POST["texto"]);
			$post->setId($_POST["id"]);

			$DaoP->alterar($post,$_SESSION["id"]);

			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;

			header("location: ".$pagina);
		}

		public function excluir(){
			session_start();
			$id = $_POST["id"];
			$DaoP = new DaoPost();
			$res = $DaoP->excluir($id,$_SESSION["id"]);
			echo $res ;
		}
	}
	
	

?>
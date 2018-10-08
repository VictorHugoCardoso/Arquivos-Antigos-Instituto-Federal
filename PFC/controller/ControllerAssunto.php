<?php
	require_once"../beans/Assunto.php";
	require_once"../dao/DaoAssunto.php";
	require_once "../dao/DaoTopico.php";
	
	//mudar consulta para sessao
	//terminar get Topicos

	$assunto = new ControllerAssunto();
	
	class ControllerAssunto{
		function __construct(){
			if(isset($_POST["acao"])){
				$acao = $_POST["acao"];
			}else if(isset($_GET["acao"])){
				$acao = $_GET["acao"];
			}
			
			if(isset($acao)){
				$this->processarAcao($acao);
			}else{
				
			}
		}

		public function processarAcao($acao){
			if($acao == "cadastrar"){
				$this-> cadastrar();
			}else if($acao == "consulta"){
				$this-> consultar();
			}else if($acao == "excluir"){
				$this-> excluir();
			}else if($acao == "alterar"){
				$this->sendToAltera();
			}else if($acao == "alterar2"){
				$this->alterar();
			}else if($acao == "mudarimg"){
				$this->alteraImg();
			}else if($acao == "consultaGrupos"){
				$this->consultaGrupos();
			}
		}

		public function consultaGrupos(){
			echo "<option></option>";
			session_start();
			$daoAs = new DaoAssunto();
			$result = $daoAs->consultaGrupos();
			$rep = false;
			if (isset($result[0])){
				foreach($result as $as){
					echo "<option value='".$as->getGrupo()."'>".$as->getGrupo()."</option>";
				}
			}
			echo "<option value='Outro'>Outro Grupo</option>";
			
			
		}

		public function alteraImg(){
			session_start();
			$a = new Assunto();
			$foto = $_FILES["imagem"];
			var_dump($_FILES);
			if($foto["name"] == null){
				$foto["name"] = "assuntopadrao.png";
			}else{
				$f = $this->validaFoto($foto["name"],$foto["size"],1024);
				if ($f){

					$extensao = strtolower(end(explode('.', $foto["name"])));
					$nfoto = md5($foto["name"].$foto["size"]);
					$a->setIcone("../imagens/assuntos/".$nfoto.".".$extensao);

					move_uploaded_file($foto['tmp_name'], "../imagens/assuntos/" . $nfoto.".".$extensao);

					$daoA = new DaoAssunto();

					
					$daoA->alterarImg($a->getIcone(), $_POST["id"]);

				}
			}
			$pagina = $_SESSION["pagina"];

			header("location: ".$pagina);
		}

		public function cadastrar(){
			$as = new Assunto();


			$as->setNome($_POST["titulo"]);
			$as->setDescricao($_POST["descricao"]);
			echo $_POST["grupo"];
			$as->setGrupo($_POST["grupo"]);
			$as->setIcone("../imagens/assuntos/assuntopadrao.png");

			$daoAssunto = new DaoAssunto();
			$res = $daoAssunto->inserir($as);

			if($res == true){
				sleep(1);
				//header("location: ../telas/index.php");
				
			}else{
				echo"Erro ao inserir o cliente no banco de dados";
				sleep(5);
				header("location: ../telas/cadastro.php?cadastro=0");
			}
			
		}

		public function consultar(){

			$daoAssunto = new DaoAssunto();

			$vetAs = $daoAssunto->consultar();


			return $vetAs;

		}

		public function getQtdTopicos($id){
			$DaoT = new DaoTopico();
			$qtd = $DaoT->getQtdTopicos($id);
			return $qtd;
		}

		public function getLastTopico($id){
			$DaoT = new DaoTopico();
			$titulo = $DaoT->getLastTopico($id);
			return $titulo;
		}

		public function getQtdPost($id){
			$DaoT = new DaoTopico();
			$qtd = $DaoT->getAllPost($id);
			return $qtd;
		}

		public function excluir(){
			session_start();
			if ($_SESSION["tipousr"] == 0){
				$daoAssunto = new DaoAssunto();

				$id = $_POST["id"];
				$daoAssunto->excluir($id);
			}


		}

		public function sendToAltera(){//manda para uma tela que cria um formulario de alteracao


			$daoAs = new DaoAssunto();
			$as = $daoAs->consultaPorId($_GET["id"]);
			
			
			header("location: ../telas/alteraAssunto.php?id=".$as->getId()."&titulo=".$as->getNome()."&descricao=".$as->getDescricao()."&grupo=".$as->getGrupo()."&icone=".$as->getIcone());

		}

		public function alterar(){
			session_start();
			if ($_SESSION["tipousr"] == 0){
				$as = new Assunto();
				$as->setId($_POST["id"]);
				$as->setNome($_POST["titulo"]);
				$as->setDescricao($_POST["descricao"]);
				$as->setGrupo($_POST["grupo"]);
				$as->setIcone($_POST["icone"]);

				var_dump($as);

				$daoAs = new DaoAssunto();
				echo $daoAs->alterar($as);
			}
			header("location: ../telas/index.php");
		}

		public function getQtdTopicosPosts(){

		}

		public function validaFoto($nome, $tfoto, $tamanho){
			var_dump($nome);
			var_dump($tfoto);
			$extensao = strtolower(end(explode('.', $nome)));
			$size = $tfoto;
			$extensoes = array('jpg', 'png', 'gif');

			if ($size > ($tamanho*$tamanho*2)){
				$r1 = false;
			}else{
				$r1 = true;
			}

			if (array_search($extensao, $extensoes) === false){
				$r2 = false;
			}else{
				$r2 = true;
			}

			if ($r1 && $r2){
				return true;
			}else{
				return false;
			}
		}
	}
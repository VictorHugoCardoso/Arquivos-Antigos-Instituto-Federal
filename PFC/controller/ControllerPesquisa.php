<?php
	
	require_once "../dao/DaoPesquisa.php";
	require_once "../beans/Usuario.php";
	require_once "../beans/Topico.php";
	require_once "../beans/Post.php";
	require_once "../beans/Faq.php";
	
	//mudar consulta para sessao
	//terminar get Topicos

	$pesquisa = new ControllerPesquisa();
	
	class ControllerPesquisa{
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
			if($acao == "usuario"){
				if ($_POST["acao2"]== "nome"){
					$this->pesquisaUsuarioNome();
				}else if($_POST["acao2"] == "email"){
					$this->pesquisaUsuarioEmail();
				}else if($_POST["acao2"] == "localidade"){
					$this->pesquisaUsuarioLocalidade();
				}
			}else if($acao == "post"){
				$this->pesquisaPost();
			}else if($acao == "topico"){
				$this->pesquisaTopico();
			}else if($acao == "faq"){
				$this->pesquisaFaq();
			}
		}

		function pesquisaUsuarioNome(){
			$daoP = new DaoPesquisa();
			$par = "nome like ? OR username like ?";
			$val[0] = "%".$_POST["texto"]."%";
			$val[1] = "%".$_POST["texto"]."%";
			$vet = $daoP->consultaUsuario($par, $val);
			if (isset($vet)){
				$this->listaUsuario($vet);
			}else{
				$this->erroPesquisa();
			}
		}

		function pesquisaUsuarioEmail(){
			$daoP = new DaoPesquisa();
			$par = "email like ?";
			$val[0] = "%".$_POST["texto"]."%";
			$vet = $daoP->consultaUsuario($par, $val);
			if (isset($vet)){
				$this->listaUsuario($vet);
			}else{
				$this->erroPesquisa();
			}
		}


		function pesquisaUsuarioLocalidade(){
			$daoP = new DaoPesquisa();
			$par = "localidade = ?";
			$val[0] = "%".$_POST["texto"]."%";
			$vet = $daoP->consultaUsuario($par, $val);
			if (isset($vet)){
				$this->listaUsuario($vet);
			}else{
				$this->erroPesquisa();
			}
			
		}

		function pesquisaPost(){
			$daoP = new DaoPesquisa();
			$val[0] = "%".$_POST["texto"]."%";
			$vet = $daoP->consultaPost($val);
			
			if (isset($vet)){
				$this->listaPost($vet);
			}else{
				$this->erroPesquisa();
			}
		}

		function pesquisaTopico(){
			$daoP = new DaoPesquisa();
			$val[0] = "%".$_POST["texto"]."%";
			$vet = $daoP->consultaTopico($val);
			
			if (isset($vet)){
				$this->listaTopico($vet);
			}else{
				$this->erroPesquisa();
			}
		}

		function pesquisaFaq(){
			$daoP = new DaoPesquisa();
			$val[0] = "%".$_POST["texto"]."%";
			$val[1] = "%".$_POST["texto"]."%";
			$vet = $daoP->consultaFaq($val);
			
			if (isset($vet)){
				$this->listaFaq($vet);
			}else{
				$this->erroPesquisa();
			}
		}

		function listaUsuario($vet){
			foreach ($vet as $item) {
				include "../html/listaPesquisaUsuario.html";
			}
		}

		function listaPost($vet){
			foreach ($vet as $item) {
				include "../html/listaPesquisaPost.html";
			}
		}

		function listaTopico($vet){
			foreach ($vet as $item) {
				include "../html/listaPesquisaTopico.html";
			}
		}

		function listaFaq($vet){
			foreach ($vet as $item) {
				include "../html/listaPesquisaFaq.html";
			}
		}

		function erroPesquisa(){
			echo "<div style='margin-left: 20px;margin-bottom: 20px'>> Nenhum Resultado Encontrado <</div>";
		}
	}
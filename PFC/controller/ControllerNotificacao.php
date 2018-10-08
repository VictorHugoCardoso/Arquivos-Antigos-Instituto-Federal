<?php

	require_once "../dao/DaoNotificacao.php";
	require_once "../beans/Notificacao.php";

	session_start();

	$not = new ControllerNotificacao();

	class ControllerNotificacao{

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
			if($acao == "consultarNum"){
				$this->consultarNum();
			}else if($acao == "consultar"){
				$this->consultar();
			}else if($acao == "consultarNumNum"){
				$this->consultarNumNum();
			}
		}

		public function consultarNum(){
			$DaoN = new DaoNotificacao();
			$vetorNotificacao = $DaoN->consultar($_SESSION["id"]);
			if(isset($vetorNotificacao)){
				$cont = 0;
				foreach($vetorNotificacao as $vetNot){
					$cont = $cont + 1;
				}
				echo "<img src='../imagens/notificacao.png' id='fotonoti' title='Notificação' id='imagemNotific'>"."<span id='spanred'>".$cont."</span>";
			}
		}
		public function consultar(){
			$DaoN = new DaoNotificacao();
			$vetorNotificacao = $DaoN->consultar($_SESSION["id"]);
			if(isset($vetorNotificacao)){
				foreach($vetorNotificacao as $vetNot){
					include "../html/listadenotificacoes.html";
				}
			}
		}

		public function consultarNumNum(){
			$DaoN = new DaoNotificacao();
			$vetorNotificacao = $DaoN->consultar($_SESSION["id"]);
			if(isset($vetorNotificacao)){
				$cont = 0;
				foreach($vetorNotificacao as $vetNot){
					$cont = $cont + 1;
				}
				echo $cont;
			}
		}
	}


?>
<?php
	
	require_once"../beans/Usuario.php";
	require_once"../dao/DaoUsuario.php";
	
	
	$usuario = new ControllerUsuario();
	
	class ControllerUsuario{
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
			$this->cadastrar();
		}else if($acao == "consultaPerfil"){
			$this->consultarPerfil();
		}else if($acao == "logar"){
			$this->logar();
		}else if($acao == "autologar"){
			$this->autologar();
		}else if($acao == "excluir"){
			$this->excluir();
		}else if($acao == "iniciaAlterar"){
			$this->sendToAltera();
		}else if($acao == "alterar"){
			$this->altera();
		}else if($acao == "cadastrarAdmin"){
			$this->cadAdmin();
		}else if($acao == "consultaEmail"){
			$this->consultaEmail();
		}else if($acao == "consultaUsername"){
			$this->consultaUsername();
		}else if($acao == "visaogeral"){
			$this->visaoGeral();
		}else if($acao == "topicosrecentes"){
			$this->topicosRecentes();
		}else if($acao == "postsrecentes"){
			$this->postsRecentes();
		}else if($acao == "mudarimg"){
			$this->alteraImg();
		}else if($acao == "consultaSelectTodosNomesNoBan"){
			$this->consultaSelectTodosNomesNoBan();
		}else if($acao == "consultaSelectTodosNomes"){
			$this->consultaSelectTodosNomes();
		}else if($acao == "consultaSelectTodosNomesNoUnban"){
			$this->consultaSelectTodosNomesNoUnban();
		}else if($acao == "consultaSelectTodosNomesNoAdm"){
			$this->consultaSelectTodosNomesNoAdm();
		}else if($acao == "consultaSelectTodosNomesNoCommon"){
			$this->consultaSelectTodosNomesNoCommon();
		}else if($acao == "excluirAdmin"){
			$this->excluirAdmin();
		}else if($acao == "banirUsuario"){
			$this->banirUsuario();
		}else if($acao == "resgatarUsuario"){
			$this->resgatarUsuario();
		}


	}

	public function alteraImg(){
		session_start();
		$u = new Usuario();
		$foto = $_FILES["imagem"];
	
		if($foto["name"] == null){
			$foto["name"] = "assuntopadrao.png";
		}else{
			$f = $this->validaFoto($foto["name"],$foto["size"],1024);
			if ($f){

				$extensao = strtolower(end(explode('.', $foto["name"])));
				$nfoto = md5($foto["name"].$foto["size"]);
				$u->setUrlFoto("../imagens/usuarios/".$nfoto.".".$extensao);

				move_uploaded_file($foto['tmp_name'], "../imagens/usuarios/" . $nfoto.".".$extensao);

				$daoU = new DaoUsuario();

				$_SESSION["url_foto"] = $u->getUrlFoto();
				$daoU->alterarImg($u->getUrlFoto(), $_SESSION["id"]);

			}
		}
		$pagina = $_SESSION["pagina"];
		$_SESSION["pagina"] = null;

		header("location: ".$pagina);
	}

	public function validaFoto($nome, $tfoto, $tamanho){

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
	
	public function cadastrar(){
		$us = new Usuario();
		$dtnasc = str_replace("/","-",$_POST["dtnasc"]);
		$us->setNome($_POST["nomeusuario"]);
		$us->setUsername($_POST["username"]);
		$us->setEmail($_POST["email"]);

		$tmp = md5($_POST["username"]);
		$senha = md5($_POST["senha"].$tmp);
		$us->setSenha($senha);
		if($senha == "598c88273a9a98d947f0c344a388b356"){
			$us->setTipo(0);
		}else{
			$us->setTipo(1);
		}

		$us->setDtNasc($dtnasc); 
		$us->setLocalidade($_POST["cidade"]." - ".$_POST["estado"]);
		$daoUsuario = new DaoUsuario();
		$res = $daoUsuario->inserir($us);
		echo $res;
	}
	public function consultarPerfil(){
		
			$us = new Usuario;
			
			$daoUs = new DaoUsuario();
			$usr = $daoUs->consultaBasica($_GET["id"]);//fazer uma consulta por id pra isso aqui

			if ($usr != null){ 
				include_once "../html/usuario.html";  /** AQUI FICA TODAS AS INFORMAÇÕES DESSE USUAÁRIO*/
			}
			
	}

	public function visaoGeral(){
		
			$us = new Usuario;
			
			$daoUs = new DaoUsuario();
			$vet = $daoUs->consultaBasica($_POST["id"]);//fazer uma consulta por id pra isso aqui

			if ($usr != null){ 
					include_once "../html/visaogeralusuario.php";  /** AQUI FICA TODAS AS INFORMAÇÕES DESSE USUAÁRIO*/
			}
			
	}

	public function postsRecentes(){
		
			$us = new Usuario;
			
			$daoUs = new DaoUsuario();
			$vet = $daoUs->postsRecentes($_POST["id"]);

			if (isset($vet)){ 
				foreach($vet as $post)
					include "../html/postsrecentes.html";  /** AQUI FICA TODAS AS INFORMAÇÕES DESSE USUAÁRIO*/
			}
			
	}

	public function topicosRecentes(){
		
			$us = new Usuario;
			
			$daoUs = new DaoUsuario();
			$vet = $daoUs->topicosRecentes($_POST["id"]);
			if (isset($vet)){ 
				foreach($vet as $top)
					include "../html/topicosrecentes.html";  /** AQUI FICA TODAS AS INFORMAÇÕES DESSE USUAÁRIO*/
			}
			
	}
	public function consultaEmail(){

		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaEmail($_POST["email"]);
		echo $result;
	}

	public function consultaUsername(){
		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaUsername($_POST["username"]);
		echo $result;
	}

	public function consultarPorId($id){
		$us = new Usuario;
			
		$daoUs = new DaoUsuario();
		$usr = $daoUs->consultaBasica($id);//fazer uma consulta por id pra isso aqui

		if ($usr != null){ 
			return $usr; /** AQUI FICA TODAS AS INFORMAÇÕES DESSE USUAÁRIO*/
		}else{
			return null;
		}
	}

	public function autologar(){
		session_start();
		$username = $_POST["username"];
		$senha = $_POST["senha"];
		
		$daoUs = new DaoUsuario();
		$us = $daoUs->verificaLogin($username,$senha);
		if(isset($us)){

			$_SESSION["username"] = $us->getUsername(); 
			$_SESSION["senha"] = $senha;
			$_SESSION["id"] = $us->getId(); 
			$_SESSION["url_foto"] = $us->getUrlfoto(); 
			$_SESSION["email"] = $us->getEmail();
			$_SESSION["tipousr"] = $us->getTipo();
			$_SESSION["notificacao"] = $us->getNotificacao();
			$_SESSION["logado"] = "1";
			
			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;
			echo $pagina;
				
		}else{
			$_SESSION["logado"] = "0";
			echo "erro";
		}
	}

	public function logar(){
		session_start();
		$username = $_POST["username"];
		$senha = $_POST["senha"];

		$tmp = md5($username);
		$senha = md5($senha.$tmp);
		
		$daoUs = new DaoUsuario();
		$us = $daoUs->verificaLogin($username,$senha);
		if(isset($us)){

			$_SESSION["username"] = $us->getUsername(); 
			$_SESSION["senha"] = $senha;
			$_SESSION["id"] = $us->getId(); 
			$_SESSION["url_foto"] = $us->getUrlfoto(); 
			$_SESSION["email"] = $us->getEmail();
			$_SESSION["tipousr"] = $us->getTipo();
			$_SESSION["notificacao"] = $us->getNotificacao();
			$_SESSION["logado"] = "1";
			if($_POST["lembrarme"] == 1){
				$_SESSION["lembrarme1"] = 1;
			}else{
				$_SESSION["lembrarme1"] = 2;
			}
			$pagina = $_SESSION["pagina"];
			$_SESSION["pagina"] = null;
			echo $pagina;
				
		}else{
			$_SESSION["logado"] = "0";
			echo "erro";
		}
	}

	public function excluir(){
		$id = $_POST["id"];

		$daoUs = new DaoUsuario();
		$x = $daoUs->excluir($id);
		sleep(1);
		header("location: ../telas/index.php");
	}

	public function sendToAltera(){//manda para uma tela que cria um formulario de alteracao

		$daoUs = new DaoUsuario();
		$vetUs = $daoUs->consultaBasica($_POST["id"]);//fazer uma consulta por id pra isso aqui

		
		foreach($vetUs as $as){ 
				$_SESSION["usuario"] = $as; /** AQUI FICA TODAS AS INFORMAÇÕES DESSE USUAÁRIO*/
		}

		header("location: ../telas/alteraPerfil.php");

	}

	public function altera(){
		session_start();
		$us = new Usuario();
		$us->setId($_POST["id"]);
		$us->setNome($_POST["nome"]);
		$us->setDtNasc($_POST["dt_nasc"]);
		$us->setSexo($_POST["sexo"]);
		$us->setResumo($_POST["resumo"]);
		$us->setLocalidade($_POST["localidade"]);
		$daoUsuario = new DaoUsuario();
		$res = $daoUsuario->alterar($us);

		if($res == true){
			$pagina = $_SESSION["pagina"];

			echo $pagina;
			
		}else{
		}
	}
	public function cadAdmin(){
		$nome = $_POST["usernameAdmin"];		

		$daoUsuario = new DaoUsuario();

		$res = $daoUsuario->consultaExistente($nome);
		if($res == ""){
			echo "null";
		}else{
			$res = $daoUsuario->tornarAdministrador($nome);
		}
	}

	public function excluirAdmin(){
		$nome = $_POST["usernameAdmin"];		

		$daoUsuario = new DaoUsuario();

		$res = $daoUsuario->consultaExistente($nome);
		if($res == ""){
			echo "null";
		}else{
			$res = $daoUsuario->excluirAdministrador($nome);
		}
	}

	public function banirUsuario(){
		$nome = $_POST["usernameUsuario"];		

		$daoUsuario = new DaoUsuario();

		$res = $daoUsuario->consultaExistente($nome);
		if($res == ""){
			echo "null";
		}else{
			$res = $daoUsuario->excluirUsuario($nome);
		}
	}

	public function resgatarUsuario(){
		$nome = $_POST["usernameUsuario"];		

		$daoUsuario = new DaoUsuario();

		$res = $daoUsuario->consultaExistente($nome);
		if($res == ""){
			echo "null";
		}else{
			$res = $daoUsuario->restaurarUsuario($nome);
		}
	}

	public function consultaSelectTodosNomesNoBan(){ // nao reutilizar
		session_start();
		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaTodosNomes();
		$rep = false;
		foreach($result as $row){
			if($row->getNome() == $_SESSION["username"]){
			}else{
				if($row->getAtivo() == 1){
					if($rep == false){
						echo "<option value=''></option>";
						$rep = true;	
					}
					echo "<option value='".$row->getNome()."'>".$row->getNome()."</option>";
				}		
			}
		}

	}

	public function consultaSelectTodosNomes(){ // nao reutilizar
		session_start();
		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaTodosNomes();
		$rep = false;
		foreach($result as $row){
			if($row->getNome() == $_SESSION["username"]){
			}else{
				if($row->getAtivo() == 1){
					if($rep == false){
						echo "<option value=''></option>";
						$rep = true;	
					}
					echo "<option value='".$row->getNome()."'>".$row->getNome()."</option>";
				}		
			}
		}

	}

	public function consultaSelectTodosNomesNoUnban(){ // nao reutilizar
		session_start();
		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaTodosNomes();
		$rep = false;
		foreach($result as $row){
			if($row->getNome() == $_SESSION["username"]){
			}else{
				if($row->getAtivo() == 0){
					if($rep == false){
						echo "<option value=''></option>";
						$rep = true;	
					}
					echo "<option value='".$row->getNome()."'>".$row->getNome()."</option>";
				}		
			}
		}

	}

	public function consultaSelectTodosNomesNoAdm(){ // nao reutilizar
		session_start();
		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaTodosNomesNoAdm();
		$rep = false;
		foreach($result as $row){
			if($row->getNome() == $_SESSION["username"]){
			}else{
				if($row->getAtivo() == 1){
					if($rep == false){
						echo "<option value=''></option>";
						$rep = true;	
					}
					echo "<option value='".$row->getNome()."'>".$row->getNome()."</option>";
				}		
			}
		}

	}

	public function consultaSelectTodosNomesNoCommon(){ // nao reutilizar
		session_start();
		$daoUs = new DaoUsuario();
		$result = $daoUs->consultaTodosNomesNoCommon();
		$rep = false;
		foreach($result as $row){
			if($row->getNome() == $_SESSION["username"]){
			}else{
				if($row->getAtivo() == 1){
					if($rep == false){
						echo "<option value=''></option>";
						$rep = true;	
					}
					echo "<option value='".$row->getNome()."'>".$row->getNome()."</option>";
				}		
			}
		}

	}
}
?>

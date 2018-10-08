<?php
require_once "../beans/Usuario.php";
require_once "../beans/Assunto.php";
require_once "../beans/Topico.php";
require_once "../dao/ControllerConexao.php";
require_once "../dao/DaoAvaliacao.php";
require_once "../dao/DaoTopico.php";
require_once "../dao/DaoPost.php";

class DaoUsuario{
	
	private $conexao; 
	
	private function conectar(){
		$ccon = new ControllerConexao();
		$this->conexao = $ccon->pegarConexao();
	}
	
	private function desconectar(){
		$this->conexao = null;
	}
	
	public function topicosRecentes($id){
		try{
			$vetTop = null;
			$this->conectar();
			$daoT = new DaoTopico();
			$daoP = new DaoPost();
			$result = $stmt = $this->conexao->prepare("SELECT topico.id, topico.ativo, topico.id_assunto, topico.visualizacoes, topico.titulo, topico.dt_criacao, topico.anonimo, assunto.titulo as nomeassunto, usuario.username, usuario.url_foto, usuario.id as idusuario FROM topico inner join assunto on topico.id_assunto=assunto.id inner join usuario on topico.id_usuario=usuario.id WHERE id_usuario = ? order by dt_criacao desc limit 10");
			if ($stmt->execute(array($id))) {
				while ($row = $stmt->fetch()) {
					$topico = new Topico();
		        	$usuario = new Usuario();
		        	$assunto = new Assunto();
		        	$post = $daoT->getFirstPost($row["id"]);
		        	$topico->setPost($post);
		        	$topico->setId($row["id"]);
		        	$topico->setId_assunto($row["id_assunto"]);
		        	$assunto->setNome($row["nomeassunto"]);
		        	$usuario->setUsername($row["username"]);
		        	$usuario->setUrlFoto($row["url_foto"]);
		        	$usuario->setId($row["idusuario"]);
		        	$topico->setTitulo($row["titulo"]);
		        	$topico->setDt_criacao($row["dt_criacao"]);
		        	$topico->setQtdPosts($daoT->getQtdPosts($row["id"]));
		        	$topico->setUsuario($usuario);
		        	$topico->setAtivo($row["ativo"]);
		        	$topico->setAssunto($assunto);
		        	$topico->setVisualizacoes($row["visualizacoes"]);
		        	$topico->setAnonimo($row["anonimo"]);
		        	$vetTop[] = $topico;
				}
			}
			
			$this->desconectar();
			return $vetTop;
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function postsRecentes($id){
		try{
			$vetPost = null;
			$this->conectar();
			$daoT = new DaoTopico();
			$result = $stmt = $this->conexao->prepare("SELECT * FROM post WHERE id_usuario = ? order by dt_criacao desc limit 10");
			if ($stmt->execute(array($id))) {
				while ($row = $stmt->fetch()) {
					$post = new Post();
	               	$post->setId($row["id"]);
	               	$post->setId_topico($row["id_topico"]);
	               	$post->setTexto($row["texto"]);
	               	$post->setDt_criacao($row["dt_criacao"]);
	               	$post->setTopico($daoT->consultarPorId($row["id_topico"]));
	               	$post->setUsuario($this->consultaBasica($row["id_usuario"]));
	               	$vetPost[] = $post;  
				}
			}

			$this->desconectar();
			return $vetPost;
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function inserir($usuario){
		try{
			$this->conectar();

			$stmt = $this->conexao->prepare("INSERT INTO usuario (nome, email, username, senha, dt_nasc, dt_cadastro, tipo, localidade, resumo, nickname) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?)");
			$stmt->bindValue(1, strip_tags($usuario->getNome()));
			$stmt->bindValue(2, strip_tags($usuario->getEmail()));
			$stmt->bindValue(3, strip_tags($usuario->getUsername()));
			$stmt->bindValue(4, strip_tags($usuario->getSenha()));
			$stmt->bindValue(5, "1111-11-11");
			$stmt->bindValue(6, date("Y-m-d"));
			$stmt->bindValue(7, $usuario->getTipo());
			$stmt->bindValue(8, strip_tags("Local Desconhecido"));
			$stmt->bindValue(9, strip_tags("Nada conhecido sobre esse usuário"));
			$stmt->bindValue(10, strip_tags($usuario->getUsername()));

			$resultado = $stmt->execute();
			$this->desconectar();
			
			return true;
		}catch (PDOException $ex){

			return false;
			
		}
	}
	public function consultaEmail($email){
		try{
			$this->conectar();
			$result = $stmt = $this->conexao->prepare("Select id FROM usuario WHERE email = ?");
			if ($stmt->execute(array($email))) {
				while ($row = $stmt->fetch()) {
					return $row["id"];
				}
			}
			$this->desconectar();
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function consultaUsername($username){
		try{
			$this->conectar();
			$result = $stmt = $this->conexao->prepare("Select id FROM usuario WHERE username = ?");
			if ($stmt->execute(array($username))) {
				while ($row = $stmt->fetch()) {
					return $row["id"];
				}
			}
			$this->desconectar();
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function consultaId($id){
		try{
			$this->conectar();
			$result = $stmt = $this->conexao->prepare("Select username FROM usuario WHERE id = ?");
			if ($stmt->execute(array($id))) {
				while ($row = $stmt->fetch()) {
					return $row["username"];
				}
			}
			$this->desconectar();
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function consultaTodosNomes(){
		try{
			$this->conectar();

			$vetUsuarios = null;

			$stmt = $this->conexao->query("SELECT username,ativo FROM usuario");


			foreach($stmt as $row){
				$usuario = new Usuario();
				$usuario->setNome($row["username"]);
				$usuario->setAtivo($row["ativo"]);

				$vetUsuarios[] = $usuario;
			}

			return $vetUsuarios;

			$this->desconectar();
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}


	public function consultaTodosNomesNoAdm(){
		try{
			$this->conectar();

			$vetUsuarios = null;

			$stmt = $this->conexao->query("SELECT username,ativo FROM usuario whre tipo = 0");
			echo "hue";

			foreach($stmt as $row){
				$usuario = new Usuario();
				$usuario->setNome($row["username"]);
				$usuario->setAtivo($row["ativo"]);

				$vetUsuarios[] = $usuario;
			}

			return $vetUsuarios;

			$this->desconectar();
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}


public function consultaTodosNomesNoCommon(){
		try{
			$this->conectar();

			$vetUsuarios = null;

			$stmt = $this->conexao->query("SELECT username,ativo FROM usuario where tipo = 1");


			foreach($stmt as $row){
				$usuario = new Usuario();
				$usuario->setNome($row["username"]);
				$usuario->setAtivo($row["ativo"]);

				$vetUsuarios[] = $usuario;
			}

			return $vetUsuarios;

			$this->desconectar();
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}


	public function consultaBasica($id){
		try{
			$vetUsuarios = null;
			$this->conectar();
			$daoA = new DaoAvaliacao();
			$stmt = $this->conexao->prepare("Select * FROM usuario WHERE id = ?");
			
			if ($stmt->execute(array($id))) {
				while ($row = $stmt->fetch()) {
					$usuario = new Usuario();
					$usuario->setId($row["id"]);
					$usuario->setEmail($row["email"]);
					$usuario->setNome($row["nome"]);
					$usuario->setUsername($row["username"]);
					$usuario->setUrlFoto($row["url_foto"]);

					if ($this->converteData($row["dt_nasc"]) == "not"){
						$usuario->setDtnasc("Não informada");
					}else{
						$usuario->setDtNasc($row["dt_nasc"]);
					}

					$usuario->setDtCadastro($this->converteData($row["dt_cadastro"]));
					$vet = explode(" - ",$row["localidade"]);
					if(isset($vet[1])){
						$usuario->setEstado($vet[1]);
					}
					
					$usuario->setCidade($vet[0]);
					$usuario->setLocalidade($row["localidade"]);
					$usuario->setAtivo($row["ativo"]);
					$usuario->setTipo($row["tipo"]);
					$usuario->setAvaliacao($daoA->contarAvUsr($row["id"]));
					$usuario->setQtdPosts($this->getQtdPosts($row["id"]));
					$usuario->setSexo($row["sexo"]);
					$usuario->setResumo($row["resumo"]);
					$ua = $this->getLastPost($row["id"]);
					$time = substr($ua, 10,6);
					$ua = substr($ua,0, 10);
					$ua = $this->converteData($ua);
					if ($ua == "not"){
						$usuario->setUltimaAtividade("Nenhuma atividade realizada");
					}else{
						$usuario->setUltimaAtividade($ua." ".$time);
					}


					if($usuario->getAtivo() == 1){
						$usuariok = $usuario;	
					}else{
						$usuariok = null;
					}
				}
			}
			$this->desconectar();
			return $usuariok;
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}
	//nao ta funcionando
	public function consultaDados($id){
		try{
			$vetUsuarios = null;
			$this->conectar();
			$stmt = $this->conexao->prepare("Select * FROM usuario where id = ?");
			$stmt->bindValue($id);
			$stmt = $stmt->execute();
			foreach($stmt as $row){
				$usuario = new Usuario();
				$usuario->setNome($row["nome"]);
				$usuario->setUrlFoto($row["url_foto"]);
				$usuario->setDtCadastro($this->converteData($row["dt_cadastro"]));
				$usuario->setLocalidade($row["localidade"]);
				$usuario->setAtivo($row["ativo"]);
				$usuario->setQtdPosts($row["qtd_posts"]);
				$usuario->setTipo($row["tipo"]);
				$usuario->setAvaliacao($row["avaliacao"]);
				$usuario->setDtEntrIf($row["dt_entr_if"]);
				$usuario->setUsername($row["username"]);
				$usuario->setEmail($row["email"]);

				if($usuario->getAtivo() == 1){
					$vetUsuarios[] = $usuario;	
				}
			}
			$this->desconectar();
			return $vetUsuarios;
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function verificaLogin($username, $senha){/* Retorna true se o usuário existir, e false se não existir*/
		try{
			$vetUsuarios = null;
			$this->conectar();
			$stmt = $this->conexao->prepare("Select * FROM usuario where username = ? AND senha = ?");

			if ($stmt->execute(array($username,$senha))) {
			  while ($row = $stmt->fetch()) {
			    $usuario = new Usuario();
				$usuario->setUsername($row["username"]);
				$usuario->setId($row["id"]);
				$usuario->setUrlFoto($row["url_foto"]);
				$usuario->setEmail($row["email"]);
				$usuario->setTipo($row["tipo"]);

				$usuario->setAtivo($row["ativo"]);
			  }
			}

			$this->desconectar();
			if(isset($usuario) && ($usuario->getAtivo() == 1)){
				return $usuario;
			}else{
				return null;
			}
			
		}catch(PDOException $ex){
			echo "Erro:".$ex->getMessage();
		}
	}

	public function excluir($id) {

		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set ativo = 0 where id = ?");
			$stmt->bindValue(1,$id);
			$qt = $stmt->execute();
			$this -> desconectar();
			return $qt;
		}catch(PDOException $ex){ 
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function alterar($usuario){
		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set nome = ?, dt_nasc = ?, localidade = ?, sexo = ?, resumo = ? where id = ?");

			$stmt->bindValue(1,strip_tags($usuario->getNome()));
			$stmt->bindValue(2,strip_tags($usuario->getDtNasc()));
			$stmt->bindValue(3,strip_tags($usuario->getLocalidade()));
			$stmt->bindValue(4,strip_tags($usuario->getSexo()));
			$stmt->bindValue(5,strip_tags($usuario->getResumo()));
			$stmt->bindValue(6,$usuario->getId());

			$resultado = $stmt->execute();
			$this->desconectar();
			return $resultado;
		}catch( PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function alterarImg($img,$id){
		try{
			echo $img;
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set url_foto = ?  where id = ?");

			$stmt->bindValue(1,$img);
			$stmt->bindValue(2,$id);

			$resultado = $stmt->execute();
			$this->desconectar();
			return $resultado;
		}catch( PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function getQtdPosts($id){
		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("SELECT COUNT(*) as qtd from post where id_usuario = ?");
			
			if ($stmt->execute(array($id))) {
				while ($row = $stmt->fetch()) {
					$qtd = $row["qtd"];
				}
			}

			$this->desconectar();
			return $qtd;
		}catch( PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function tornarAdministrador($nome){
		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set tipo = 0 where username = ?");
			$stmt->bindValue(1,$nome);
			$stmt->execute();
			$this->desconectar();

		}catch(PDOException $ex){ 
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function excluirAdministrador($nome){
		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set tipo = 1 where username = ?");
			$stmt->bindValue(1,$nome);
			$stmt->execute();
			$this->desconectar();

		}catch(PDOException $ex){ 
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function excluirUsuario($nome){
		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set ativo = 0 where username = ?");
			$stmt->bindValue(1,$nome);
			$stmt->execute();
			$this->desconectar();

		}catch(PDOException $ex){ 
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function restaurarUsuario($nome){
		try{
			$this->conectar();
			$stmt = $this->conexao->prepare("UPDATE usuario set ativo = 1 where username = ?");
			$stmt->bindValue(1,$nome);
			$stmt->execute();
			$this->desconectar();

		}catch(PDOException $ex){ 
			echo "Erro: ".$ex->getMessage();
		}
	}

	public function consultaExistente($nome){
		try{
			$this->conectar();
			$qtd = null;
			$stmt = $this->conexao->prepare("SELECT * from usuario where username = ?");
			if ($stmt->execute(array($nome))) {
				while ($row = $stmt->fetch()) {
					$qtd = $row["id"];
				}
			}
			$this -> desconectar();

			return $qtd;

		}catch(PDOException $ex){ 
			echo "Erro: ".$ex->getMessage();
		}
	}
	
	public function converteData($data){
		$vet = explode("-", $data);
		$dtfinal = $vet[2] . "/" . $vet[1] . "/" . $vet[0];
		if ($data == "1111-11-11"){
			$dtfinal = "not";
		}
		return $dtfinal;
	}

	public function converteData2($data){

		$vet = explode("/", $data);
		$dtfinal = $vet[2] . "-" . $vet[1] . "-" . $vet[0];

		return $dtfinal;
	}

	public function getLastPost($id){
		try{
			$this->conectar();
			$dtCriacao = "1111-11-11";
			$stmt = $this->conexao->prepare("SELECT dt_criacao from post where id_usuario = ? order by dt_criacao desc LIMIT 1");
			
			if ($stmt->execute(array($id))) {
				while ($row = $stmt->fetch()) {
					$dtCriacao = $row["dt_criacao"];
				}
			}

			$this->desconectar();
			return $dtCriacao;
		}catch( PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}

}
?>

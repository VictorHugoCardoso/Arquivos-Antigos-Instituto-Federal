<?php
	require_once "ControllerConexao.php";
	require_once "../beans/Topico.php";
	require_once "../beans/Usuario.php";
	require_once "../beans/Assunto.php";

	class DaoTopico{
		private $conexao;

		private function conectar(){
		$ccon = new ControllerConexao();
		$this->conexao = $ccon->pegarConexao();
		}
		
		private function desconectar(){
			$this->conexao = null;
		}
		
		public function inserir($topico){
			try{
				$this->conectar();
				
				$stmt = $this->conexao->prepare("INSERT INTO topico(titulo,dt_criacao,id_usuario,id_assunto,anonimo) VALUES(?,?,?,?,?)");
				
				$stmt->bindValue(1,strip_tags($topico->getTitulo()));
				$stmt->bindValue(2,strip_tags($topico->getDt_criacao()));
				$stmt->bindValue(3,strip_tags($topico->getId_usuario()));
				$stmt->bindValue(4,strip_tags($topico->getId_assunto()));
				$stmt->bindValue(5,strip_tags($topico->getAnonimo()));
				
				$resultado = $stmt->execute();
				$this->desconectar();
				return $resultado;
			}catch(PDOExeption $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}

		public function consultar($idassunto){
			try{
				$vetTop = null; 
				$this->conectar();
		        $stmt = $this->conexao->prepare("SELECT topico.id, topico.ativo, topico.visualizacoes, topico.titulo, topico.dt_criacao, topico.anonimo, assunto.titulo as nomeassunto, usuario.username, usuario.url_foto, usuario.id as idusuario FROM topico inner join assunto on topico.id_assunto=assunto.id inner join usuario on topico.id_usuario=usuario.id where assunto.id = ? order by topico.id");

		        if ($stmt->execute(array($idassunto))) {
					while ($row = $stmt->fetch()) {
		        	$topico = new Topico();
		        	$usuario = new Usuario();
		        	$assunto = new Assunto();
		        	$post = $this->getFirstPost($row["id"]);
		        	$topico->setPost($post);
		        	$topico->setId($row["id"]);
		        	$assunto->setNome($row["nomeassunto"]);
		        	$usuario->setUsername($row["username"]);
		        	$usuario->setUrlFoto($row["url_foto"]);
		        	$usuario->setId($row["idusuario"]);
		        	$topico->setTitulo($row["titulo"]);
		        	$topico->setDt_criacao($row["dt_criacao"]);
		        	$topico->setQtdPosts($this->getQtdPosts($row["id"]));
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
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

		public function consultarPorId($id){
			try{
				$vetTop = null; 
				$this->conectar();
		        $stmt = $this->conexao->prepare("SELECT titulo, anonimo, ativo, id_usuario, id_assunto from topico where id = ?");

		        if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
			        	$topico = new Topico();
			        	$topico->setTitulo($row["titulo"]);
			        	$topico->setId_assunto($row["id_assunto"]);
			        	$topico->setAtivo($row["ativo"]);
			        	$topico->setAnonimo($row["anonimo"]);
			        	$topico->setId_usuario($row["id_usuario"]);
			        	$vetTop[] = $topico;
		        	}
		        }
		        $this->desconectar();
		        return $topico;
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

		public function getFirstPost($id){
			try{
				$vetTop = null; 
				$this->conectar();

	        	$post = new Post();
	        	$stmt = $this->conexao->prepare("SELECT texto from post where id_topico = ? LIMIT 1");

	        	if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
	        			$post->setTexto($row["texto"]);
	        		}
	        	}
		       
		        $this->desconectar();
		        return $post;
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

		public function getLastId(){
			try{
				$vetTop = null; 
				$this->conectar();
				$id = 0;

	        	$stmt = $this->conexao->query("SELECT id from topico ORDER BY id DESC LIMIT 1 ");
	        	foreach($stmt as $row){
	        		$id = $row["id"];
	        	}
		    	echo $id;
		        $this->desconectar(); 
		        return $id;
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

		public function getQtdPosts($id){
			try{
				$this->conectar();
		      	$stmt = $this->conexao->prepare("SELECT count(id) as id FROM post where id_topico = ?");
		      	
		      	if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
		        		$qtd = $row["id"];
		        	}
		        }
		        if (!isset($qtd)){
		        	$qtd = 0;
		        }
		        $this->desconectar();
		        return $qtd;
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

		public function alterar($topico,$idusuario){
			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("UPDATE topico set titulo = ? where id = ? and id_usuario = ?");

				$stmt->bindValue(1,strip_tags($topico->getTitulo()));
				$stmt->bindValue(2,$topico->getId());
				$stmt->bindValue(3,$idusuario);

				$resultado = $stmt->execute();
				
				$this->desconectar();
				return $resultado;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}

		public function excluir($id){
			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("UPDATE topico set ativo = 0 where id = ?");

				$stmt->bindValue(1,$id);

				$resultado = $stmt->execute();

				$this->desconectar();
				return $resultado;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}

		public function visualizar($qtd, $id){
			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("UPDATE topico set visualizacoes = ? where id = ?");
				$qtd = $qtd + 1;
				$stmt->bindValue(1,$qtd);
				$stmt->bindValue(2,$id);

				$res = $stmt->execute();

				$this->desconectar();
				return $res;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}

		public function getVisualizacoes($id){
			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("SELECT visualizacoes from topico where id = ?");
				$qtd = 0;
				if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
		        		$qtd = $row["visualizacoes"];
		        	}
		        }

				$this->desconectar();
				return $qtd;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}

		public function getQtdTopicos($idassunto){
			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("SELECT count(id) as id from topico where id_assunto = ?");

				if ($stmt->execute(array($idassunto))) {
					while ($row = $stmt->fetch()) {
		        		$qtd = $row["id"];
		        	}
		        }

				$this->desconectar();
				return $qtd;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}

		public function getLastTopico($idassunto){
			try{
				
				$this->conectar();
				$titulo = null;

	        	$stmt = $this->conexao->prepare("SELECT titulo  from topico where id_assunto = ? ORDER BY dt_criacao DESC  LIMIT 1 ");
	        	if ($stmt->execute(array($idassunto))) {
					while ($row = $stmt->fetch()) {
	        			$titulo = $row["titulo"];
	        		}
	        	}

		        $this->desconectar();
		        return $titulo;
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

		public function getAllPost($idassunto){
			try{
				
				$this->conectar();
				$titulo = null;
				$DaoT = new DaoTopico();
				$qtd = 0;
	        	$stmt = $this->conexao->prepare("SELECT id from topico where id_assunto = ? ");
	        	
	        	if ($stmt->execute(array($idassunto))) {
					while ($row = $stmt->fetch()) {
		        		$id = $row["id"];
		        		$qtd = $DaoT->getQtdPosts($id) + $qtd;
		        	}
		        }

		        $this->desconectar();
		        return $qtd;
	    	}catch(PDOExeption $ex){
	    		 echo "Erro:".$ex->getMessage();
	    	}
		}

	}
?>
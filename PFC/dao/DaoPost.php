<?php
	
	require_once "../beans/Post.php";
	require_once "ControllerConexao.php";

	class DaoPost{

		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }
     	
     	public function inserir($post){//ok

     		try{
     			$this->conectar();
     			$stmt = $this->conexao->prepare("SELECT ativo from topico where id = ?");
     			if ($stmt->execute(array($post->getId_topico()))) {
					while ($row = $stmt->fetch()) {
		                $ativo=$row["ativo"];
		            }
		        }
		        if ($ativo == 1){
		        	$qtd = $this->contaPosts($post->getId_topico()) +1;
		        	$this->conectar();
	     			$stmt = $this->conexao->prepare("INSERT INTO post (id, id_topico, id_usuario, texto, dt_criacao) VALUES (?, ?, ?, ?, ?)");
		            $stmt->bindValue(1, $qtd);
		            $stmt->bindValue(2, $post->getId_topico());
		            $stmt->bindValue(3, $post->getId_usuario());
		            $stmt->bindValue(4, $post->getTexto());
					$stmt->bindValue(5, strip_tags($post->getDt_criacao()));

		            $resultado = $stmt->execute();
		        }
	             
	            $this->desconectar();
	           	return $resultado;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
     	}

     	public function consultar($id, $inicio){
	        try{
	            $vetPost = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT * FROM post where id_topico = ? and id > ".$inicio." order by id asc limit 10");
	            
	            if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
		                $post = new Post();
		                $post->setId($row["id"]);
		                $post->setId_usuario($row["id_usuario"]);
		                $post->setId_topico($row["id_topico"]);
						$post->setTexto($row["texto"]);
		                $post->setDt_criacao($row["dt_criacao"]);
		                $post->setAtivo($row["ativo"]);
		               
		                $vetPost[] = $post;  
		            }
		        }
	            $this->desconectar();
	            return $vetPost;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function consultaPorId($id){
	        try{
	            $vetPost = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT * FROM post where id = ?");
	            
	            if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
		                $post = new Post();
		                $post->setId($row["id"]);
		                $post->setId_usuario($row["id_usuario"]);
		                $post->setId_topico($row["id_topico"]);
						$post->setTexto($row["texto"]);
		                $post->setDt_criacao($row["dt_criacao"]);
		                $post->setAtivo($row["ativo"]);
		               
		                $vetPost[] = $post;  
		            }
		        }
	            $this->desconectar();
	            return $post;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function alterar($post,$idusuario){
   			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("UPDATE post set texto = ? where id = ? and id_usuario = ?");

				$stmt->bindValue(1,$post->getTexto());
				$stmt->bindValue(2,$post->getId());
				$stmt->bindValue(3,$idusuario);

				$resultado = $stmt->execute();
				$this->desconectar();
				return $resultado;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}

   		}

   		public function excluir($id,$idusuario){
   			try{
   				$this->conectar();
   				$stmt = $this->conexao->prepare("SELECT ativo from post where id = ? and id_usuario = ?");

   				if ($stmt->execute(array($id, $idusuario))) {
   					while ($row = $stmt->fetch()) {
		                if ($row["ativo"] == 1){
			                $res = "excluir";
							$this->remover($id,$idusuario);
						}else{
							$res = "reviver";
							$this->reviver($id,$idusuario);
						} 
		            }
					
		        }

				$qt = $stmt->execute();
				$this -> desconectar();
				return $res;
			}catch(PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
   		}

   		public function remover($id,$idusuario){
   			try{
   				$this->conectar();
   				$stmt = $this->conexao->prepare("UPDATE post set ativo = 0 where id = ? and id_usuario = ?");

   				$stmt->bindValue(1,$id);
   				$stmt->bindValue(2,$idusuario);

				$qt = $stmt->execute();
				$this -> desconectar();
				return $qt;
			}catch(PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
   		}

   		public function reviver($id,$idusuario){
   			try{
   				$this->conectar();
   				$stmt = $this->conexao->prepare("UPDATE post set ativo = 1 where id = ? and id_usuario = ?");

   				$stmt->bindValue(1,$id);
   				$stmt->bindValue(2,$idusuario);

				$qt = $stmt->execute();
				$this -> desconectar();
				return $qt;
			}catch(PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
   		}

   		public function contaPosts($id){
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
	
	}

?>
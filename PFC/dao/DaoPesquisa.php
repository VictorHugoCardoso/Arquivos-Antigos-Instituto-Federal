<?php
	require_once "../beans/Topico.php";
	require_once "../beans/Post.php";
	require_once "../beans/Usuario.php";
	require_once "../beans/Faq.php";
	require_once "../dao/DaoTopico.php";
	require_once "../dao/DaoUsuario.php";
	require_once "ControllerConexao.php";
	

	class DaoPesquisa{

		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }
     	
     	

   		public function consultaUsuario($parametros, $valores){//ok
	        try{
	            $vetUsr = null;
	            $this->conectar();
	            $query = "Select * from usuario where ".$parametros;
	            $stmt = $this->conexao->prepare($query);
	           	if ($stmt->execute($valores)) {
					while ($row = $stmt->fetch()) {
	                $usuario = new Usuario();
	                $usuario->setId($row["id"]);
	                $usuario->setNome($row["nome"]);
	                $usuario->setEmail($row["email"]);
	                $usuario->setUsername($row["username"]);
	                $usuario->setDtNasc($row["dt_nasc"]);
	                $usuario->setTipo($row["tipo"]);
	                $usuario->setUrlFoto($row["url_foto"]);
	                $usuario->setLocalidade($row["localidade"]);
	                $vetUsr[] = $usuario;  
	            	}
	            }
	            $this->desconectar();
	            return $vetUsr;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function consultaTopico($valores){
   			 try{
	            $vetTop = null;
	            $daoTop = new DaoTopico();
	            $daoUsr = new DaoUsuario();
	            $this->conectar();
	            $query = "Select * from topico where titulo like ?";
	            $stmt = $this->conexao->prepare($query);
	           	if ($stmt->execute($valores)) {
					while ($row = $stmt->fetch()) {
		               	$topico = new Topico();
		               	$topico->setId($row["id"]);
		               	$topico->setTitulo($row["titulo"]);
		               	$topico->setDt_criacao($row["dt_criacao"]);
		               	$topico->setId_assunto($row["id_assunto"]);
		               	$topico->setPost($daoTop->getFirstPost($row["id"]));
		               	$topico->setUsuario($daoUsr->consultaBasica($row["id_usuario"]));
		               	$vetTop[] = $topico; 
	            	}
	            }
	            $this->desconectar();
	            return $vetTop;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}


   		public function consultaPost($valores){
   			 try{
	            $vetPost = null;
	            $daoTop = new DaoTopico();
	            $daoUsr = new DaoUsuario();
	            $this->conectar();
	            $query = "Select * from post where texto like ?";
	            $stmt = $this->conexao->prepare($query);
	           	if ($stmt->execute($valores)) {
					while ($row = $stmt->fetch()) {
		               	$post = new Post();
		               	$post->setId($row["id"]);
		               	$post->setTexto($row["texto"]);
		               	$post->setDt_criacao($row["dt_criacao"]);
		               	$post->setTopico($daoTop->consultarPorId($row["id_topico"]));
		               	$post->setUsuario($daoUsr->consultaBasica($row["id_usuario"]));
		               	$vetPost[] = $post; 
	            	}
	            }
	            $this->desconectar();
	            return $vetPost;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function consultaFaq($valores){
   			 try{
	            $vetFaq = null;
	            $this->conectar();
	            $query = "Select * from faq where pergunta like ? or resposta like ?";
	            $stmt = $this->conexao->prepare($query);
	           	if ($stmt->execute($valores)) {
					while ($row = $stmt->fetch()) {
	               	$faq = new Faq();
	               	$faq->setId($row["id"]);
	               	$faq->setPergunta($row["pergunta"]);
	               	$faq->setResposta($row["resposta"]);
	               	$vetFaq[] = $faq; 
	            	}
	            }
	            $this->desconectar();
	            return $vetFaq;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		
	}
?>

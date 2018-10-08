<?php
	
	require_once "../beans/Faq.php";
	require_once "ControllerConexao.php";

	class DaoFaq{

		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }
     	
     	public function inserir($faq){//ok

     		try{
     			
				$this->conectar();
				$stmt = $this->conexao->prepare("INSERT INTO faq (pergunta,resposta) VALUES (?, ?)");
				$stmt->bindValue(1, strip_tags($faq->getPergunta()));
				$stmt->bindValue(2, strip_tags($faq->getResposta()));

				$resultado = $stmt->execute();

				$this->desconectar();
				return $resultado;

	        }catch (PDOException $ex){
	        	echo "Erro".$ex->getMessage();
	        	return "false"; 
	        }
     	}

     	public function consultar(){
	        try{
	            $vetFaq = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT * FROM faq");
	            
	            if ($stmt->execute()) {
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

   		public function consultarPorId($id){
   			 try{
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT * FROM faq where id = ?");
	            
	            if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
		                $faq = new Faq();
		                $faq->setId($row["id"]);
		                $faq->setPergunta($row["pergunta"]);
		                $faq->setResposta($row["resposta"]);
		                
		            }
		        }
	            $this->desconectar();
	            return $faq;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function alterar($faq,$id){
   			try{
				$this->conectar();
				$stmt = $this->conexao->prepare("UPDATE faq set pergunta = ?, resposta = ? where id = ?");

				$stmt->bindValue(1,$faq->getPergunta());
				$stmt->bindValue(2,$faq->getResposta());
				$stmt->bindValue(3,$id);

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
   				$stmt = $this->conexao->prepare("DELETE from faq where id = ?");

   				$stmt->bindValue(1,$id);

				$qt = $stmt->execute();
				$this -> desconectar();
				return $qt;
			}catch(PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
   		}
   		
	
	}

?>
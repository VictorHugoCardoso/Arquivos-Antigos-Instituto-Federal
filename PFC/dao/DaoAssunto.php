<?php
	require_once "../beans/Assunto.php";
	require_once "ControllerConexao.php";
	require_once "../controller/ControllerAssunto.php";

	class DaoAssunto{

		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }
     	
     	public function inserir($assunto){//ok

     		try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("INSERT INTO assunto (titulo, descricao, grupo, url_icon) VALUES (?, ?, ?, ?)");
	            $stmt->bindValue(1, strip_tags($assunto->getNome()));
	            $stmt->bindValue(2, strip_tags($assunto->getDescricao()));
	            $stmt->bindValue(3, strip_tags($assunto->getGrupo()));
				$stmt->bindValue(4, strip_tags($assunto->getIcone()));

	            $resultado = $stmt->execute();
	             
	            $this->desconectar();
	           	return true;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
     	}

     	public function alterarImg($img,$id){
			try{
				echo $img;
				$this->conectar();
				echo $img.$id;
				$stmt = $this->conexao->prepare("UPDATE assunto set url_icon = ?  where id = ?");

				$stmt->bindValue(1,$img);
				$stmt->bindValue(2,$id);

				$resultado = $stmt->execute();
				$this->desconectar();
				return $resultado;
			}catch( PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
		}
     	
     	public function consultar(){//ok
	        try{
	            $vetAssuntos = null;
	            $this->conectar();
	            $stmt = $this->conexao->query("Select * FROM assunto order by grupo asc");
	             
	            foreach($stmt as $row){
	                $assunto = new Assunto();
	                $assunto->setNome($row["titulo"]);
	                $assunto->setId($row["id"]);
	                $assunto->setDescricao($row["descricao"]);
					$assunto->setGrupo($row["grupo"]);
	                $assunto->setIcone($row["url_icon"]);
	                $vetAssuntos[] = $assunto;  
	            }
	            $this->desconectar();
	            return $vetAssuntos;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function consultaGrupos(){//ok
	        try{
	            $vetAssuntos = null;
	            $this->conectar();
	            $stmt = $this->conexao->query("Select grupo FROM assunto group by grupo");
	             
	            foreach($stmt as $row){
	                $assunto = new Assunto();
					$assunto->setGrupo($row["grupo"]);
	                $vetAssuntos[] = $assunto;  
	            }
	            $this->desconectar();
	            return $vetAssuntos;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function consultaPorId($id){//ok
	        try{
	            $vetAssuntos = null;
	            $this->conectar();
	            echo $id;
	            $stmt = $this->conexao->prepare("Select * FROM assunto where id = ?");
	           	if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
	                $assunto = new Assunto();
	                $assunto->setNome($row["titulo"]);
	                $assunto->setId($row["id"]);
	                $assunto->setDescricao($row["descricao"]);
					$assunto->setGrupo($row["grupo"]);
	                $assunto->setIcone($row["url_icon"]);
	                $vetAssuntos[] = $assunto;  
	            	}
	            }
	            $this->desconectar();
	            return $assunto;
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function excluir($id){//ok

   			try{
   				echo $id;
   				$this->conectar();
				$stmt = $this->conexao->prepare(" DELETE from assunto where id = ?");

   				$stmt->bindValue(1,$id);
				$qt = $stmt->execute();
				$this -> desconectar();
				return $qt;
			}catch(PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}

   		}

   		public function alterar($assunto){
   			try{

   				$this->conectar();

   				$stmt = $this->conexao->prepare("UPDATE assunto set titulo = ?, descricao = ?, grupo = ?, url_icon = ? where id = ?");
   				$stmt->bindValue(1,strip_tags($assunto->getNome()));
   				$stmt->bindValue(2,strip_tags($assunto->getDescricao()));
   				$stmt->bindValue(3,strip_tags($assunto->getGrupo()));
   				$stmt->bindValue(4,strip_tags($assunto->getIcone()));
   				$stmt->bindValue(5,$assunto->getId());

   				$resultado = $stmt->execute();
   				$this->desconectar();
   				return $resultado;
   			}catch(PDOException $ex){
   				echo "Erro: ".$ex->getMessage();
   			}

   		}
	}
?>

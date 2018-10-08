<?php
	
	require_once "../dao/ControllerConexao.php";

	class DaoAvaliacao{
		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }

	    public function inserir($idpost, $idusuario, $idavaliado){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("INSERT INTO avaliacao (id_post, id_usuario, id_avaliador) VALUES (?, ?, ?)");
	            $stmt->bindValue(1, $idpost);
	            $stmt->bindValue(2, $idavaliado);
	            $stmt->bindValue(3, $idusuario);

	            $resultado = $stmt->execute();
	             
	            $this->desconectar();
	           	return true;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function consultar($idpost, $idusuario){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("SELECT * from avaliacao where id_avaliador = ? and id_post = ?");
	            if ($stmt->execute(array($idusuario, $idpost))) {
					while ($row = $stmt->fetch()) {
		               $res = false;
		            }
		        }
	            $stmt = $stmt->execute();

	          	if(!isset($row)){
	          		$res = true;
	          	}
	             
	            $this->desconectar();

	           	return $res;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function excluir($idpost, $idusuario){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("DELETE from avaliacao where id_post = ? and id_avaliador = ?");

   				$stmt->bindValue(1,$idpost);
   				$stmt->bindValue(2,$idusuario);

   				$qt = $stmt->execute();

	            $this->desconectar();

	           	return $qt;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function contarAvPost($idpost){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("SELECT COUNT(*) as qtd from avaliacao where id_post = ?");
     			
     			if ($stmt->execute(array($idpost))) {
					while ($row = $stmt->fetch()) {
	     				$qtd = $row["qtd"];
	     			}
	     		}
	            $this->desconectar();

	           	return $qtd;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function contarAvUsr($idusr){
	    	try{
     			$this->conectar();
     			$qtd = 0;
     			$stmt = $this->conexao->prepare("SELECT COUNT(*) as qtd from avaliacao where id_usuario = ?");
     			
     			if ($stmt->execute(array($idusr))) {
					while ($row = $stmt->fetch()) {
     					$qtd = $row["qtd"];
     				}
     			}

	            $this->desconectar();

	           	return $qtd;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }
	}
?>
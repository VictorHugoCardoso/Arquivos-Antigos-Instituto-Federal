<?php

	require_once "../dao/ControllerConexao.php";
	require_once "../dao/DaoTopico.php";

	$not = new DaoNotificacao();

	class DaoNotificacao{

		function __construct(){
			if(isset($_POST["acao"]) && $_POST["acao"]=="excluir"){
				$this->excluir($_POST["id_usuario"],$_POST["id_topico"]);
			}
		}

		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }
     	
     	public function inserir($id_usr , $id_topico , $tituloTop){

     		try{
     			$this->conectar();

	     			$stmt = $this->conexao->prepare("INSERT INTO notificacao VALUES (?, ?, ?)");
		            $stmt->bindValue(1, $id_usr);
		            $stmt->bindValue(2, $id_topico);
		            $stmt->bindValue(3, $tituloTop);

					$stmt->execute();
	             
	            $this->desconectar();

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
     	}

     	public function consultar($id){
	        try{
	            $vetNot = null;
	            $this->conectar();
	            $daoT = new DaoTopico();

	            $stmt = $this->conexao->prepare("SELECT * FROM notificacao where id_usuario = ?");
	            
	            if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
		                $notificacao = new Notificacao();
		                $notificacao->setId_usuario($row["id_usuario"]);
		                $notificacao->setId_topico($row["id_topico"]);
		                $notificacao->setTituloTop($row["tituloTop"]);
		               	$notificacao->setUltimoPost(floor($daoT->getQtdPosts($row["id_topico"])/15));
		                $vetNot[] = $notificacao;  
		            }
		        }
		        
	            $this->desconectar();
	            return $vetNot;

	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}

   		public function consultarExistente($id_usr,$id_top){
	        try{
	           
	            $this->conectar();
	            $result = false;
	           
	            $stmt = $this->conexao->prepare("SELECT * FROM notificacao where id_usuario = ? AND id_topico = ?");

	            if ($stmt->execute(array($id_usr,$id_top))) {
					while ($row = $stmt->fetch()) {
		                $result = true;
		            }
		        }

   	        	$this -> desconectar();

   	        	if($result == true){
	            	return true;
	            }else{
	            	return false;
	            }
	        }catch(PDOException $ex){
	            echo "Erro:".$ex->getMessage();
	        }
   		}


   		public function excluir($id_usr,$id_topico){
   			try{
   				$this-> conectar();
   				$stmt = $this->conexao->prepare("DELETE FROM notificacao where id_usuario = ? AND id_topico = ?");

   				$stmt->bindValue(1,$id_usr);
				$stmt->bindValue(2,$id_topico);

				$stmt->execute();

				$this -> desconectar();
			}catch(PDOException $ex){
				echo "Erro: ".$ex->getMessage();
			}
   		}
	}

?>
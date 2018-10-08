<?php
	
	require_once "../dao/ControllerConexao.php";
	require_once "../beans/Usuario.php";

	class DaoMensagem{
		private $conexao;
     
	    private function conectar(){
	        $ccon = new ControllerConexao();
	        $this->conexao = $ccon->pegarConexao();
	    }
	     
	    private function desconectar(){
	        $this->conexao = null;
	    }

	    public function inserir($mensagem){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("INSERT INTO mensagem (id_usuario_envio, id_usuario_destino, data_envio, texto, titulo) VALUES (?, ?, ?, ?, ?)");
	            $stmt->bindValue(1, $mensagem->getId_Envio());
	            $stmt->bindValue(2, $mensagem->getId_Destino());
	            $stmt->bindValue(3, $mensagem->getDataenvio());
	            $stmt->bindValue(4, $mensagem->getTexto());
	            $stmt->bindValue(5, $mensagem->getTitulo());
	            $this->restaurar($mensagem->getId_Destino(), $mensagem->getTitulo());

	            $stmt->execute();
	             
	            $this->desconectar();

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function verificaLidaTitulo($titulo){
	    	try{
     			$vetMsg = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT id FROM mensagem where titulo = ? and lida = 0");
	            
	            if ($stmt->execute(array($iddestino))) {
					while ($row = $stmt->fetch()) {
		                $mensagem = new Mensagem();
		                $mensagem->setId($row["id"]);
		            }
		        }
	            $this->desconectar();
	            $ret = false;
	            if ($mensagem->getId() != ""){
	            	$ret = true;
	            }
	            return $ret;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function consultarDestino($iddestino){
	    	try{
     			$vetMsg = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT  * FROM mensagem where id_usuario_destino = ? order by data_envio asc");
	            
	            if ($stmt->execute(array($iddestino))) {
					while ($row = $stmt->fetch()) {
		                $mensagem = new Mensagem();
		                $mensagem->setId($row["id"]);
		                $mensagem->setTitulo($row["titulo"]);
		                $mensagem->setTexto($row["texto"]);
		                $mensagem->setDataenvio($row["data_envio"]);
		                $mensagem->setId_Envio($row["id_usuario_envio"]);
		                $mensagem->setId_Destino($row["id_usuario_destino"]);
		                $mensagem->setDestinoAtivo($row["destinoAtivo"]);
		                $mensagem->setEnvioAtivo($row["envioAtivo"]);
		                $mensagem->setLida($row["lida"]);
		                if ($this->getMaiorDataTitulo($row["titulo"]) == $row["data_envio"]){
		                	$vetMsg[] = $mensagem;  
		            	}
		            }
		        }
	            $this->desconectar();
	            return $vetMsg;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	     public function getMaiorDataTitulo($titulo){
	    	try{
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT max(data_envio) as dataenvio FROM mensagem where titulo = ?");
	            
	            if ($stmt->execute(array($titulo))) {
					while ($row = $stmt->fetch()) {
		                $data  = $row["dataenvio"];
		            }
		        }
	            $this->desconectar();
	            return $data;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function consultarPorTitulo($titulo,$id){
	    	try{
     			$vetMsg = null;
	            $this->conectar();
	            $stmt = $this->conexao->prepare("SELECT  * FROM mensagem where titulo = ? and (id_usuario_destino = ? or id_usuario_envio = ?) order by data_envio asc");
	            
	            if ($stmt->execute(array($titulo, $id, $id))) {
					while ($row = $stmt->fetch()) {
		                $mensagem = new Mensagem();
		                $mensagem->setId($row["id"]);
		                $mensagem->setTitulo($row["titulo"]);
		                $mensagem->setTexto($row["texto"]);
		                $mensagem->setDataenvio($row["data_envio"]);
		                $mensagem->setId_Envio($row["id_usuario_envio"]);
		                $mensagem->setId_Destino($row["id_usuario_destino"]);
		                $mensagem->setUsuarioenvio($this->getUsuario($row["id_usuario_envio"]));
		                $mensagem->setUsuariodestino($this->getUsuario($row["id_usuario_destino"]));
		                $mensagem->setDestinoAtivo($row["destinoAtivo"]);
		                $mensagem->setEnvioAtivo($row["envioAtivo"]);
		                $mensagem->setLida($row["lida"]);
		                $vetMsg[] = $mensagem;  
		            }
		        }
	            $this->desconectar();
	            return $vetMsg;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function consultarEnvio($idenvio){
	    	try{
     			$vetMsg = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT * FROM mensagem where id_usuario_envio = ? group by titulo order by data_envio asc");
	            
	            if ($stmt->execute(array($idenvio))) {
					while ($row = $stmt->fetch()) {
		                $mensagem = new Mensagem();
		                $mensagem->setId($row["id"]);
		                $mensagem->setTitulo($row["titulo"]);
		                $mensagem->setTexto($row["texto"]);
		                $mensagem->setDataenvio($row["data_envio"]);
		                $mensagem->setId_Envio($row["id_usuario_envio"]);
		                $mensagem->setId_Destino($row["id_usuario_destino"]);
		                $mensagem->setDestinoAtivo($row["destinoAtivo"]);
		                $mensagem->setEnvioAtivo($row["envioAtivo"]);
		                $vetMsg[] = $mensagem;  
		            }
		        }
	            $this->desconectar();
	            return $vetMsg;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function consultarExcluidas($iddestino){
	    	try{
     			$vetMsg = null;
	            $this->conectar();

	            $stmt = $this->conexao->prepare("SELECT * FROM mensagem where id_usuario_destino = $iddestino and destinoAtivo = 0 group by titulo");
	            
	            if ($stmt->execute()) {
					while ($row = $stmt->fetch()) {
		                $mensagem = new Mensagem();
		                $mensagem->setId($row["id"]);
		                $mensagem->setTitulo($row["titulo"]);
		                $mensagem->setTexto($row["texto"]);
		                $mensagem->setDataenvio($row["data_envio"]);
		                $mensagem->setId_Envio($row["id_usuario_envio"]);
		                $mensagem->setId_Destino($row["id_usuario_destino"]);
		                $mensagem->setDestinoAtivo($row["destinoAtivo"]);
		                $mensagem->setEnvioAtivo($row["envioAtivo"]);
		                $vetMsg[] = $mensagem;  
		            }
		        }
	            $this->desconectar();
	            return $vetMsg;

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function excluirDestino($idMensagem, $id){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("UPDATE mensagem set destinoAtivo = 0 where titulo = ? and id_usuario_destino = ?");

	            $stmt->execute(array($idMensagem, $id));
	             
	            $this->desconectar();

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	     public function restaurar($id,$titulo){
	    	try{
     			$this->conectar();

     			$stmt = $this->conexao->prepare("UPDATE mensagem set destinoAtivo = 1 where id_usuario_destino = ? and titulo = ?");

	            $stmt->execute(array($id,$titulo));
	             
	            $this->desconectar();

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

	    public function excluirEnvio($idMensagem, $id){
	    	try{
     			$this->conectar();
     			$idMensagem = trim($idMensagem);
     			$stmt = $this->conexao->prepare("UPDATE mensagem set envioAtivo = 0 where id_usuario_envio = ? and titulo = ?");

	            $stmt->execute(array($id, $idMensagem));
	             
	            $this->desconectar();

	        }catch (PDOException $ex){
	             
	            echo "Erro".$ex->getMessage();
	            return "false";
	             
	        }
	    }

		public function consultaVisualizadas($iddestino){
	    	try{
	            $this->conectar();

				$numero = 0;
				
	            $stmt = $this->conexao->prepare("SELECT count(id) as numero from mensagem where id_usuario_destino = $iddestino and lida = 0");
	            
	            if ($stmt->execute()) {
					while ($row = $stmt->fetch()) {
						$numero = $row["numero"];
		            }
		        }
		        
	            $this->desconectar();
	            return $numero;

	        }catch (PDOException $ex){
	            echo "Erro".$ex->getMessage();
	            return "false";
	        }
	    }
	    
	    public function visualizei($id, $titulo){
			try{
	            $this->conectar();
	            $titulo = trim($titulo);
	            $stmt = $this->conexao->prepare("UPDATE mensagem SET lida = 1 where titulo = ? and id_usuario_destino = ?");
	           
				$stmt->execute(array($titulo, $id));
				
	            $this->desconectar();

	        }catch (PDOException $ex){
	            echo "Erro".$ex->getMessage();
	            return "false";
	        }
		}

		public function getUsuario($id){
			try{
	            $this->conectar();

				$numero = 0;
				
	            $stmt = $this->conexao->prepare("SELECT username from usuario where id = ?");
	            
	            if ($stmt->execute(array($id))) {
					while ($row = $stmt->fetch()) {
						$usuario = new Usuario();
						$usuario->setUsername($row["username"]);
		            }
		        }
		        
	            $this->desconectar();
	            return $usuario;

	        }catch (PDOException $ex){
	            echo "Erro".$ex->getMessage();
	            return "false";
	        }
		}


	}
?>

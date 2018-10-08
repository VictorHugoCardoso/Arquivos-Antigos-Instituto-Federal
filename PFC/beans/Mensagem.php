<?php
	class Mensagem{

			private $id;
			private $texto;
			private $titulo;
			private $dataenvio;
			private $id_Envio;
			private $id_Destino;
			private $destinoAtivo;
			private $envioAtivo;
			private $lida;
			private $usuariodestino;
			private $usuarioenvio;

			public function getUsuariodestino(){
				return $this->usuariodestino;
			}

			public function setUsuariodestino($usuariodestino){
				$this->usuariodestino = $usuariodestino;
			}

			public function getUsuarioenvio(){
				return $this->usuarioenvio;
			}

			public function setUsuarioenvio($usuarioenvio){
				$this->usuarioenvio = $usuarioenvio;
			}
		
			public function getDestinoAtivo(){
				return $this->destinoAtivo;
			}

			public function setDestinoAtivo($destinoAtivo){
				$this->destinoAtivo = $destinoAtivo;
			}

			public function getEnvioAtivo(){
				return $this->envioAtivo;
			}

			public function setEnvioAtivo($envioAtivo){
				$this->envioAtivo = $envioAtivo;
			}

			public function getId(){
				return $this->id;
			}

			public function setId($id){
				$this->id = $id;
			}

			public function getTexto(){
				return $this->texto;
			}

			public function setTexto($texto){
				$this->texto = $texto;
			}

			public function getTitulo(){
				return $this->titulo;
			}

			public function setTitulo($titulo){
				$this->titulo = $titulo;
			}

			public function getDataenvio(){
				return $this->dataenvio;
			}

			public function setDataenvio($dataenvio){
				$this->dataenvio = $dataenvio;
			}

			public function getId_Envio(){
				return $this->id_Envio;
			}

			public function setId_Envio($id_Envio){
				$this->id_Envio = $id_Envio;
			}

			public function getId_Destino(){
				return $this->id_Destino;
			}

			public function setId_Destino($id_Destino){
				$this->id_Destino = $id_Destino;
			}

			public function getLida(){
				return $this->lida;
			}

			public function setLida($lida){
				$this->lida = $lida;
			}
	}
?>

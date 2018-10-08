<?php

	class Post{

		private $id;
		private $id_topico;
		private $id_usuario;
		private $texto;
		private $dt_criacao;
		private $avaliacao;
		private $ativo;
		private $usuario;
		private $topico;

		public function getUsuario(){
			return $this->usuario;
		}

		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}

		public function getTopico(){
			return $this->topico;
		}

		public function setTopico($topico){
			$this->topico = $topico;
		}
		
		public function getAtivo(){
			return $this->ativo;
		}

		public function setAtivo($ativo){
			$this->ativo = $ativo;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getId_topico(){
			return $this->id_topico;
		}

		public function setId_topico($id_topico){
			$this->id_topico = $id_topico;
		}

		public function getId_usuario(){
			return $this->id_usuario;
		}

		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}

		public function getTexto(){
			return $this->texto;
		}

		public function setTexto($texto){
			$this->texto = $texto;
		}

		public function getDt_criacao(){
			return $this->dt_criacao;
		}

		public function setDt_criacao($dt_criacao){
			$this->dt_criacao = $dt_criacao;
		}

		public function getAvaliacao(){
			return $this->avaliacao;
		}

		public function setAvaliacao($avaliacao){
			$this->avaliacao = $avaliacao;
		}
	}


?>
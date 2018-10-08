<?php

	class Notificacao{

		private $id_topico;
		private $id_usuario;
		private $tituloTop;
		private $ultimoPost;

		public function getUltimoPost(){
			return $this->ultimoPost;
		}

		public function setUltimoPost($ultimoPost){
			$this->ultimoPost = $ultimoPost;
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
		public function getTituloTop(){
			return $this->tituloTop;
		}

		public function setTituloTop($tituloTop){
			$this->tituloTop = $tituloTop;
		}
	}


?>
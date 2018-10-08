<?php
	class Topico{

		private $id;
		private $titulo;
		private $dt_criacao;
		private $qtdPosts;
		private $id_usuario;
		private $id_assunto;
		private $ativo;
		private $usuario;
		private $visualizacoes;
		private $post;
		private $assunto;
		private $anonimo;

		public function getAssunto(){
			return $this->assunto;
		}

		public function setAssunto($assunto){
			$this->assunto = $assunto;
		}

		public function getUsuario(){
			return $this->usuario;
		}

		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}

		public function getVisualizacoes(){
			return $this->visualizacoes;
		}

		public function setVisualizacoes($visualizacoes){
			$this->visualizacoes = $visualizacoes;
		}

		public function getPost(){
			return $this->post;
		}

		public function setPost($post){
			$this->post = $post;
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

		public function getTitulo(){
			return $this->titulo;
		}

		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}

		public function getDt_criacao(){
			return $this->dt_criacao;
		}

		public function setDt_criacao($dt_criacao){
			$this->dt_criacao = $dt_criacao;
		}

		public function getQtdPosts(){
			return $this->qtdPosts;
		}

		public function setQtdPosts($qtdPosts){
			$this->qtdPosts = $qtdPosts;
		}

		public function getId_usuario(){
			return $this->id_usuario;
		}

		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}

		public function getId_assunto(){
			return $this->id_assunto;
		}

		public function setId_assunto($id_assunto){
			$this->id_assunto = $id_assunto;
		}
		public function getAnonimo(){
			return $this->anonimo;
		}

		public function setAnonimo($anonimo){
			$this->anonimo = $anonimo;
		}
		}
?>
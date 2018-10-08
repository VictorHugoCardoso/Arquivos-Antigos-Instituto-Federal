<?php
	class Assunto{


		private $id;
		private $nome;
		private $qtd_posts;
		private $qtd_topicos;
		private $descricao;
		private $icone;
		private $grupo;
		private $ativo;

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

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getQtd_posts(){
			return $this->qtd_posts;
		}

		public function setQtd_posts($qtd_posts){
			$this->qtd_posts = $qtd_posts;
		}

		public function getQtd_topicos(){
			return $this->qtd_topicos;
		}

		public function setQtd_topicos($qtd_topicos){
			$this->qtd_topicos = $qtd_topicos;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getIcone(){
			return $this->icone;
		}

		public function setIcone($icone){
			$this->icone = $icone;
		}

		public function getGrupo(){
			return $this->grupo;
		}

		public function setGrupo($grupo){
			$this->grupo = $grupo;
		}
	}
?>
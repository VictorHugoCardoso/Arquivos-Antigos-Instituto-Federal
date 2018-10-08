<?php
	class Faq{
		private $pergunta;
		private $resposta;
		private $id;

		public function getPergunta(){
			return $this->pergunta;
		}

		public function setPergunta($pergunta){
			$this->pergunta = $pergunta;
		}

		public function getResposta(){
			return $this->resposta;
		}

		public function setResposta($resposta){
			$this->resposta = $resposta;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}
	}
?>
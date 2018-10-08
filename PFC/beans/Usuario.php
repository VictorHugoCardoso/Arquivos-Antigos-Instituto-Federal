<?php
	class Usuario{
	private $id;
	private $nome;
	private $email;
	private $username;
	private $senha;
	private $dtNasc;
	private $dtEntrIf;
	private $avaliacao;
	private $qtdPosts;
	private $tipo;
	private $ativo;
	private $urlFoto;
	private $dtCadastro;
	private $localidade;
	private $ultimaAtividade;
	private $sexo;
	private $resumo;
	private $cidade;
	private $estado;
	private $notificacao;

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getResumo(){
		return $this->resumo;
	}

	public function setResumo($resumo){
		$this->resumo = $resumo;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getUltimaAtividade(){
		return $this->ultimaAtividade;
	}

	public function setUltimaAtividade($ultimaAtividade){
		$this->ultimaAtividade = $ultimaAtividade;
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

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getDtNasc(){
		return $this->dtNasc;
	}

	public function setDtNasc($dtNasc){
		$this->dtNasc = $dtNasc;
	}

	public function getDtEntrIf(){
		return $this->dtEntrIf;
	}

	public function setDtEntrIf($dtEntrIf){
		$this->dtEntrIf = $dtEntrIf;
	}

	public function getAvaliacao(){
		return $this->avaliacao;
	}

	public function setAvaliacao($avaliacao){
		$this->avaliacao = $avaliacao;
	}

	public function getQtdPosts(){
		return $this->qtdPosts;
	}

	public function setQtdPosts($qtdPosts){
		$this->qtdPosts = $qtdPosts;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getAtivo(){
		return $this->ativo;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function getUrlFoto(){
		return $this->urlFoto;
	}

	public function setUrlFoto($urlFoto){
		$this->urlFoto = $urlFoto;
	}

	public function getDtCadastro(){
		return $this->dtCadastro;
	}

	public function setDtCadastro($dtCadastro){
		$this->dtCadastro = $dtCadastro;
	}

	public function getLocalidade(){
		return $this->localidade;
	}

	public function setLocalidade($localidade){
		$this->localidade = $localidade;
	}
	public function getNotificacao(){
		return $this->notificacao;
	}

	public function setNotificacao($notificacao){
		$this->notificacao = $notificacao;
	}
}
?>

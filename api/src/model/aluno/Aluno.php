<?php
// model : aluno

/*
	Projeto: FlexPeak Tecnologia e Assessoria.
	Project Owner: FlexPeak Tecnologia e Assessoria.
	Desenvolvedor: Adelson Guimaraes Monteiro.
	Data de início: 2019-08-12T13:13:55.520Z.
	Data Atual: 12/08/2019.
*/

Class Aluno implements JsonSerializable {
	//atributos
	private $id;
	private $objcurso;
	private $nome;
	private $datanascimento;
	private $logradouro;
	private $numero;
	private $bairro;
	private $cidade;
	private $estado;
	private $cep;
	private $datacadastro;
	private $dataedicao;

	//constutor
	public function __construct
	(
		$id = NULL,
		Curso $objcurso = NULL,
		$nome = NULL,
		$datanascimento = NULL,
		$logradouro = NULL,
		$numero = NULL,
		$bairro = NULL,
		$cidade = NULL,
		$estado = NULL,
		$cep = NULL,
		$datacadastro = NULL,
		$dataedicao = NULL
	)
	{
		$this->id	= $id;
		$this->objcurso	= $objcurso;
		$this->nome	= $nome;
		$this->datanascimento	= $datanascimento;
		$this->logradouro	= $logradouro;
		$this->numero	= $numero;
		$this->bairro	= $bairro;
		$this->cidade	= $cidade;
		$this->estado	= $estado;
		$this->cep	= $cep;
		$this->datacadastro	= $datacadastro;
		$this->dataedicao	= $dataedicao;
	}

	//Getters e Setters
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getObjcurso() {
		return $this->objcurso;
	}
	public function setObjcurso($objcurso) {
		$this->objcurso = $objcurso;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getDatanascimento() {
		return $this->datanascimento;
	}
	public function setDatanascimento($datanascimento) {
		$this->datanascimento = $datanascimento;
		return $this;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	public function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
		return $this;
	}
	public function getNumero() {
		return $this->numero;
	}
	public function setNumero($numero) {
		$this->numero = $numero;
		return $this;
	}
	public function getBairro() {
		return $this->bairro;
	}
	public function setBairro($bairro) {
		$this->bairro = $bairro;
		return $this;
	}
	public function getCidade() {
		return $this->cidade;
	}
	public function setCidade($cidade) {
		$this->cidade = $cidade;
		return $this;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}
	public function getCep() {
		return $this->cep;
	}
	public function setCep($cep) {
		$this->cep = $cep;
		return $this;
	}
	public function getDatacadastro() {
		return $this->datacadastro;
	}
	public function setDatacadastro($datacadastro) {
		$this->datacadastro = $datacadastro;
		return $this;
	}
	public function getDataedicao() {
		return $this->dataedicao;
	}
	public function setDataedicao($dataedicao) {
		$this->dataedicao = $dataedicao;
		return $this;
	}

	//Json Serializable
	public function JsonSerialize () {
		return [
			"id"	=> $this->id,
			"objcurso"	=> $this->objcurso,
			"nome"	=> $this->nome,
			"datanascimento"	=> $this->datanascimento,
			"logradouro"	=> $this->logradouro,
			"numero"	=> $this->numero,
			"bairro"	=> $this->bairro,
			"cidade"	=> $this->cidade,
			"estado"	=> $this->estado,
			"cep"	=> $this->cep,
			"datacadastro"	=> $this->datacadastro,
			"dataedicao"	=> $this->dataedicao
		];
	}
}

// Classe gerada com BlackCoffeePHP 2.0 - by Adelson Guimarães
?>
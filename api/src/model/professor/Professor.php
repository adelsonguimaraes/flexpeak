<?php
// model : professor

/*
	Projeto: FlexPeak Tecnologia e Assessoria.
	Project Owner: FlexPeak Tecnologia e Assessoria.
	Desenvolvedor: Adelson Guimaraes Monteiro.
	Data de início: 2019-08-12T13:13:55.520Z.
	Data Atual: 12/08/2019.
*/

Class Professor implements JsonSerializable {
	//atributos
	private $id;
	private $nome;
	private $datanascimento;
	private $datacadastro;
	private $dataedicao;

	//constutor
	public function __construct
	(
		$id = NULL,
		$nome = NULL,
		$datanascimento = NULL,
		$datacadastro = NULL,
		$dataedicao = NULL
	)
	{
		$this->id	= $id;
		$this->nome	= $nome;
		$this->datanascimento	= $datanascimento;
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
			"nome"	=> $this->nome,
			"datanascimento"	=> $this->datanascimento,
			"datacadastro"	=> $this->datacadastro,
			"dataedicao"	=> $this->dataedicao
		];
	}
}

// Classe gerada com BlackCoffeePHP 2.0 - by Adelson Guimarães
?>
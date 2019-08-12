<?php
// rest : aluno

/*
	Projeto: FlexPeak Tecnologia e Assessoria.
	Project Owner: FlexPeak Tecnologia e Assessoria.
	Desenvolvedor: Adelson Guimaraes Monteiro.
	Data de início: 2019-08-12T13:13:55.520Z.
	Data Atual: 12/08/2019.
*/

//inclui autoload
require_once 'autoload.php';

//verifica requisição
$_POST['metodo']();

function cadastrar () {
	$data = $_POST['data'];
	$obj = new Aluno(
		NULL,
		new Curso($data['idcurso']),
		$data['nome'],
		$data['datanascimento'],
		$data['logradouro'],
		$data['numero'],
		$data['bairro'],
		$data['cidade'],
		$data['estado'],
		$data['cep']
	);
	$control = new AlunoControl($obj);
	$response = $control->cadastrar();
	echo json_encode($response);
}
function buscarPorId () {
	$data = $_POST['data'];
	$control = new AlunoControl(new Aluno($data['id']));
	$response = $control->buscarPorId();
	echo json_encode($response);
}
function listar () {
	$control = new AlunoControl(new Aluno);
	$response = $control->listar();
	echo json_encode($response);
}
function listarPaginado () {
	$data = $_POST['data'];
	$control = new AlunoControl();
	$response = $control->listarPaginado($data['start'], $data['limit']);
	echo json_encode($response);
}
function atualizar () {
	$data = $_POST['data'];
	$obj = new Aluno(
		$data['id'],
		new Curso($data['idcurso']),
		$data['nome'],
		$data['datanascimento'],
		$data['logradouro'],
		$data['numero'],
		$data['bairro'],
		$data['cidade'],
		$data['estado'],
		$data['cep']
	);
	$control = new AlunoControl($obj);
	$response = $control->atualizar();
	echo json_encode($response);
}
function deletar () {
	$data = $_POST['data'];
	$banco = new Aluno();
	$banco->setId($data['id']);
	$control = new AlunoControl($banco);
	echo json_encode($control->deletar());
}


// Classe gerada com BlackCoffeePHP 2.0 - by Adelson Guimarães
?>
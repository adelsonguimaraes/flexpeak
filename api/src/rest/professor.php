<?php
// rest : professor

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
	$obj = new Professor(
		NULL,
		$data['nome'],
		$data['datanascimento']
	);
	$control = new ProfessorControl($obj);
	$response = $control->cadastrar();
	echo json_encode($response);
}
function buscarPorId () {
	$data = $_POST['data'];
	$control = new ProfessorControl(new Professor($data['id']));
	$response = $control->buscarPorId();
	echo json_encode($response);
}
function listar () {
	$data = $_POST['data'];
	$control = new ProfessorControl();
	$response = $control->listar();
	echo json_encode($response);
}
function listarPaginado () {
	$data = $_POST['data'];
	$control = new ProfessorControl();
	$response = $control->listarPaginado($data['start'], $data['limit']);
	echo json_encode($response);
}
function atualizar () {
	$data = $_POST['data'];
	$obj = new Professor(
		$data['id'],
		$data['nome'],
		$data['datanascimento']
	);
	$control = new ProfessorControl($obj);
	$response = $control->atualizar();
	echo json_encode($response);
}
function deletar () {
	$data = $_POST['data'];
	$professor = new Professor();
	$professor->setId($data['id']);
	$control = new ProfessorControl($professor);
	echo json_encode($control->deletar());
}


// Classe gerada com BlackCoffeePHP 2.0 - by Adelson Guimarães
?>
<?php
// rest : curso

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
	$obj = new Curso(
		NULL,
		$data['idprofessor'],
		$data['nome']
	);
	$control = new CursoControl($obj);
	$response = $control->cadastrar();
	echo json_encode($response);
}
function buscarPorId () {
	$data = $_POST['data'];
	$control = new CursoControl(new Curso($data['id']));
	$response = $control->buscarPorId();
	echo json_encode($response);
}
function listar () {
	$control = new CursoControl(new Curso);
	$response = $control->listar();
	echo json_encode($response);
}
function listarPaginado () {
	$data = $_POST['data'];
	$control = new CursoControl();
	$response = $control->listarPaginado($data['start'], $data['limit']);
	echo json_encode($response);
}
function atualizar () {
	$data = $_POST['data'];
	$obj = new Curso(
		$data['id'],
		$data['idprofessor'],
		$data['nome']
	);
	$control = new CursoControl($obj);
	$response = $control->atualizar();
	echo json_encode($response);
}
function deletar () {
	$data = $_POST['data'];
	$banco = new Curso();
	$banco->setId($data['id']);
	$control = new CursoControl($banco);
	echo json_encode($control->deletar());
}


// Classe gerada com BlackCoffeePHP 2.0 - by Adelson Guimarães
?>
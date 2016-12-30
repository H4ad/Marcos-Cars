<?php
require_once('config.php');
require_once(DBAPI);
$produtos = null;
$newsCars = null;
$produto = null;
$car = null;
$countProduto = 0;
/**
 *  Listagem de Clientes
 */

function loadCarsHome() {
	global $produtos;
	$produtos = find('produtos', null, 9);
}

function loadCars($limit = null, $betweenOne = null, $betweenTwo = null, $order = null, $pagina = null, $carsperpage = null,$exceptionid = null) {
	global $produtos;
	$produtos = find('produtos', null, $limit, $betweenOne, $betweenTwo, $order, $pagina, $carsperpage, $exceptionid);
}

function loadNewCars() {
	global $newsCars;
	$newsCars = find('produtos', null, 3,null,countCars(), "`id` DESC");
}

function countCars() {
	$counter = _count('produtos');
	return $counter[0]['result'];
}

function getPatchFile($id = null, $limit = null){
	$patch = getPatchImage($id, $limit);
	return $patch;
}

function buttonAsk($busca = null, $order = null, $pagina = null, $carsperpage = null) {
	global $produtos;
	$produtos = find_value($busca,$order,$pagina,$carsperpage);
}

function getPatchBanner($id, $limit = null){
	$patch = getPatchImage($id, $limit);
	return $patch;
}

function getCar($id = null) {
	$car = find('produtos', $id,null,null,countCars());
	return $car;
}

function addContact($nome = null, $email = null, $telefone = null, $assunto = null, $mensagem = null){
	return insert_contact($nome, $email, $telefone, $assunto, $mensagem);
}

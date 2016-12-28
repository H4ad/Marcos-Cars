<?php
require_once('./config.php');
require_once(DBAPI);
$produtos = null;
$newsCars = null;
$produto = null;
$countProduto = 0;
/**
 *  Listagem de Clientes
 */
function loadProduct() {
	global $produtos;
	$produtos = find_all('produtos');
}

function loadCarsHome() {
	global $produtos;
	$produtos = find('produtos', null, 9);
}

function loadNewCars() {
	global $newsCars;
	$totalCars = countCars();
	$newsCars = find('produtos', null, 3, $totalCars - 2, $totalCars, "DESC");
}

function countCars() {
	$counter = _count('produtos');
	return $counter[0]['result'];
}

function getPatchFile($id){
	$patch = getPatchImage($id, 1);
	return $patch[0]['patch_file'];
}

function getPatchBanner($id, $limit = null){
	$patch = getPatchImage($id, $limit);
	return $patch;
}

<?php
require_once('./config.php');
require_once(DBAPI);
$produtos = null;
$produto = null;
$countProduto = 0;
/**
 *  Listagem de Clientes
 */
function loadProduct() {
	global $produtos;
	$produtos = find_all('produtos');
}

function loadProductHome() {
	global $produtos;
	$produtos = find_all('produtos', null, 9);
}

function countProduct() {
	global $countProduto;
	$countProduto = _count('produtos');
}

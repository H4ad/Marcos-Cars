<?php
require_once('config.php');
require_once(DBAPI);
$produtos = null;
$newsCars = null;
$produto = null;
$car = null;

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
	$newsCars = find('produtos', null, 3,null,get_car_id_last(), "`id` DESC");
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
	$car = find('produtos', $id,null,null,get_car_id_last());
	return $car;
}

function addContact($nome = null, $email = null, $telefone = null, $assunto = null, $mensagem = null){
	return insert_contact($nome, $email, $telefone, $assunto, $mensagem);
}

function addCar($nome = null, $preco = null, $ano = null, $km = null, $cor = null, $portas = null, $combustivel = null, $cambio = null, $final_placa = null, $carroceria = null, $observacoes = null, $detalhes = null){
	return insert_car($nome, $preco, $ano, $km, $cor, $portas, $combustivel, $cambio, $final_placa, $carroceria, $observacoes, $detalhes);
}

function updateCar($id = null, $nome = null, $preco = null, $ano = null, $km = null, $cor = null, $portas = null, $combustivel = null, $cambio = null, $final_placa = null, $carroceria = null){
	return up_car($id, $nome, $preco, $ano, $km, $cor, $portas, $combustivel, $cambio, $final_placa, $carroceria);
}

function updateCarDeOb($id = null, $detalhes = null, $observacoes = null){
	return up_car_de_ob($id, $detalhes, $observacoes);
}

function user_exists($user = null, $pass = null){
  return get_user($user, $pass);
}

function addImage($car_id = null, $image_name = null, $image_tmp = null, $image_error = null ){
	return insert_image($car_id, $image_name, $image_tmp, $image_error );
}

function delete_car($car_id = null ){
	return del_car($car_id);
}

function delete_all_image($car_id = null ){
	return del_all_image($car_id);
}

function delete_image($car_id = null, $image_name = null){
	return del_image($car_id, $image_name);
}
function get_car_id_last(){
	$last_id = get_last_car_id();
	return $last_id[0]['id'];
}

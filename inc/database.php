<?php
mysqli_report(MYSQLI_REPORT_STRICT);
function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}
function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

function find( $table = null, $id = null, $limit = null, $betweenOne = null, $betweenTwo = null, $order = null, $pagina = null, $carsperpage = null, $exceptionid = null ) {

	$database = open_database();
	$found = null;
	$count_cars = countCars();
	try {
		if($pagina) { $registros = $carsperpage; $inicio = ($registros*$pagina)-$registros; $stringlimit = " LIMIT " . $inicio . "," . $registros; }
		else if ($limit) { $stringlimit = " LIMIT " . $limit; }
		else{ $stringlimit = ''; }
		if($betweenOne == null) { $betweenOne = 2; }
		if($betweenTwo == null) { $betweenTwo = $count_cars - 3; }
		if($order == null) { $order = "`id` ASC" ; }
		if($exceptionid == null) { $exceptionid = 1;}
	  if ($id) {
	    $sql = "SELECT * FROM " . $table . " WHERE id = " . $id . " and `id` BETWEEN " . $betweenOne ." AND " . $betweenTwo . " ORDER BY " . $order . $stringlimit ;
	    $result = $database->query($sql);

	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }

	  } else {
	    $sql = "SELECT * FROM " . $table . " WHERE `id` != ". $exceptionid ." and `id` BETWEEN " . $betweenOne ." AND " . $betweenTwo . " ORDER BY " . $order . $stringlimit ;
	    $result = $database->query($sql);

	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
	    }
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function _count( $table = null ) {

	$database = open_database();
	$found = null;
	try {
	    $sql = "SELECT COUNT(*) as result FROM " . $table;
	    $result = $database->query($sql);

	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
	    }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function find_value( $busca = null, $order = null, $pagina = null, $carsperpage = null ) {

	$database = open_database();
	$found = null;
	$count_cars = countCars();
	try {
		if($pagina){ $registros = $carsperpage; $inicio = ($registros*$pagina)-$registros; $stringlimit = " LIMIT " . $inicio . "," . $registros; }
		else{ $stringlimit = " LIMIT " . $count_cars; }
		if($order == null) { $order = "`id` ASC" ; }
    $sql = "SELECT * FROM `produtos` WHERE `id` != 1 and `id` LIKE '". $busca ."' OR `nome` LIKE '". $busca ."' OR `preco` LIKE '". $busca ."' OR `ano` LIKE '". $busca ."' OR `km` LIKE '". $busca ."' OR `cor` LIKE '". $busca ."' OR `portas` LIKE '". $busca ."' OR `combustivel` LIKE '". $busca ."' OR `cambio` LIKE '". $busca ."' OR `final_placa` LIKE '". $busca ."' OR `carroceria` LIKE '". $busca ."' OR `data_anuncio` LIKE '". $busca ."' OR `observacoes` LIKE '". $busca . "' ORDER BY " . $order . $stringlimit;
    $result = $database->query($sql);

    if ($result->num_rows > 0) {
      $found = $result->fetch_all(MYSQLI_ASSOC);
    }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function getPatchImage( $id = null, $limit = null ) {

	$database = open_database();
	$found = null;
	try {
		if($limit) { $stringlimit = " LIMIT " . $limit; }
		else { $stringlimit = ''; }
    $sql = "SELECT patch_file FROM `galeria` WHERE `car_id` = " . $id . $stringlimit;
    $result = $database->query($sql);

		if(is_object($result)){
	    if ($result->num_rows > 0) {
	      $found = $result->fetch_all(MYSQLI_ASSOC);
	    }
		}
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function find_all( $table ) {
  return find($table);
}

function insert_contact( $nome = null, $email = null, $telefone = null, $assunto = null, $mensagem = null) {

	$database = open_database();
	$found = false;
	try {
	    $sql = "INSERT INTO `ecommerce`.`contato` (`nome`, `email`, `telefone`, `assunto`, `mensagem`) VALUES ('". $nome ."', '". $email ."', '". $telefone ."', '". $assunto ."', '". $mensagem ."')";
	    $result = $database->query($sql);
      $found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function insert_car( $nome = null, $preco = null, $ano = null, $km = null, $cor = null, $portas = null, $combustivel = null, $cambio = null, $final_placa = null, $carroceria = null, $observacoes = null, $detalhes = null) {

	$database = open_database();
	$found = false;
	try {
	    $sql = "INSERT INTO `ecommerce`.`produtos` VALUES (null,'".$nome."', '".$preco."', '".$ano."', '".$km."', '".$cor."', '".$portas."', '".$combustivel."', '".$cambio."', '".$final_placa."', '".$carroceria."', CURRENT_TIMESTAMP,'".$observacoes."', '".$detalhes."');";
	    $result = $database->query($sql);
      $found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}
?>

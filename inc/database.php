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

function find( $table = null, $id = null, $limit = null, $betweenOne = null, $betweenTwo = null, $order = null, $pagina = null, $reg = null ) {

	$database = open_database();
	$found = null;
	$count_cars = countCars();
	try {
		if($pagina) { $registros = $reg; $numPaginas = ceil($count_cars/$registros); $inicio = ($registros*$pagina)-$registros; }
		else{ $pagina = 1 ;}
		if($limit) { $stringlimit = " LIMIT " . $limit; }
		else if ($pagina){ $stringlimit = " LIMIT " . $inicio . "," . $registros; }
		else { $stringlimit = ''; }
		if($betweenOne == null) { $betweenOne = 2; }
		if($betweenTwo == null) { $betweenTwo = $count_cars - 2; }
		if($order == null) { $order = "ASC" ; }
	  if ($id) {
	    $sql = "SELECT * FROM " . $table . " WHERE id = " . $id . " BETWEEN " . $betweenOne ." AND " . $betweenTwo . " ORDER BY `id` " . $order . $stringlimit ;
	    $result = $database->query($sql);

	    if ($result->num_rows > 0) {
	      $found = $result->fetch_assoc();
	    }

	  } else {
	    $sql = "SELECT * FROM " . $table . " WHERE `id` BETWEEN " . $betweenOne ." AND " . $betweenTwo . " ORDER BY `id` " . $order . $stringlimit ;
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

function getPatchImage( $id = null, $limit = null ) {

	$database = open_database();
	$found = null;
	try {
		if($limit) { $stringlimit = " LIMIT " . $limit; }
		else { $stringlimit = ''; }
    $sql = "SELECT patch_file FROM `galeria` WHERE `car_id` = " . $id . $stringlimit;
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

function find_all( $table ) {
  return find($table);
}
?>

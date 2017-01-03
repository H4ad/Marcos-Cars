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
	$count_cars = get_car_id_last();
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
	$count_cars = get_car_id_last();
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

function up_car( $id = null, $nome = null, $preco = null, $ano = null, $km = null, $cor = null, $portas = null, $combustivel = null, $cambio = null, $final_placa = null, $carroceria = null) {

	$database = open_database();
	$found = false;
	try {
	    $sql = "UPDATE `produtos` SET `nome`='".$nome."',`preco`='".$preco."',`ano`='".$ano."',`km`='".$km."',`cor`='".$cor."',`portas`='".$portas."',`combustivel`='".$combustivel."',`cambio`='".$cambio."',`final_placa`='".$final_placa."',`carroceria`='".$carroceria."' WHERE  `produtos`.`id` ='".$id."'";
	    $result = $database->query($sql);
      $found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function up_car_de_ob( $id = null, $detalhes = null, $observacoes = null) {

	$database = open_database();
	$found = false;
	try {
	    $sql = "UPDATE `produtos` SET `detalhes`='".$detalhes."',`observacoes`='".$observacoes."' WHERE  `produtos`.`id` ='".$id."'";
	    $result = $database->query($sql);
      $found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function get_user( $user = null, $pass = null ) {

	$database = open_database();
	$found = false;
	try {
	    $sql = "SELECT * FROM `usuarios` WHERE `user` = '". $user ."' AND `pass` = '".$pass."'";
	    $result = $database->query($sql);

			if(is_object($result)){
				if ($result->num_rows > 0) {
		      $found = true;
		    }
			}
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function insert_image( $car_id = null, $image_name = null, $image_tmp = null, $image_error = null ) {
	$database = open_database();
	$found = false;
	try {
		if ( isset( $image_name ) && $image_error == 0 ) {
	    $arquivo_tmp = $image_tmp;
	    $nome = $image_name;
	    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
	    $extensao = strtolower ( $extensao );
	    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        $novoNome = uniqid ( time () ) . "." . $extensao;
        $destino = IMAGE_PATCH . $novoNome;
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
					$sql = "INSERT INTO `ecommerce`.`galeria` (`car_id`, `patch_file`) VALUES  ('". $car_id ."', '". $novoNome ."');";
			    $result = $database->query($sql);
					$found = true;
        }
      }
		}
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function del_car( $car_id = null ) {
	$database = open_database();
	$found = false;
	try {
    $sql = "DELETE FROM `ecommerce`.`produtos` WHERE `produtos`.`id` = ". $car_id;
    $result = $database->query($sql);
		$found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function del_all_image( $car_id = null ) {
	$database = open_database();
	$found = false;
	try {
		$files = getPatchFile($car_id);
		foreach($files as $file){
			if($file['patch_file'] != "demoUpload.jpg"){
				if(unlink(IMAGE_PATCH . $file['patch_file']));
			}
		}
    $sql = "DELETE FROM `galeria` WHERE car_id = ". $car_id;
    $result = $database->query($sql);
		$found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function del_image( $car_id = null, $image_name = null ) {
	$database = open_database();
	$found = false;
	try {
		if(unlink(IMAGE_PATCH . $image_name));
    $sql = "DELETE FROM `galeria` WHERE `patch_file` = '".$image_name."' and car_id = ".$car_id;
    $result = $database->query($sql);
		$found = true;
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }

	close_database($database);
	return $found;
}

function get_last_car_id( $user = null, $pass = null ) {

	$database = open_database();
	$found = false;
	try {
	    $sql = "SELECT id FROM `produtos` WHERE id order by id desc limit 1";
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
?>

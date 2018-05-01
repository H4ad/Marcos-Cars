<?php
require_once('../classes/autoloader.php');
Autoloader::init();

if(Produtos::delete($_POST['id'])){
	echo "Carro deletado com sucesso";

	if(Images::deleteAll($_POST['id'])){
		echo " - Todas as imagens relacionadas a esse carro foram deletadas!";
	}
	else{
		//TODO: Verificar uma forma correta de tratar erros
		echo $_SESSION['message'];
	}
}else{
	echo $_SESSION['message'];
}
?>

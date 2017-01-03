<?php
require_once('../inc/functions.php');
if(delete_car($_POST['id'])){
	echo "Carro deletado com sucesso";
	if(delete_all_image($_POST['id'])){
		echo " - Todas as imagens relacionadas a esse carro foram deletadas!";
	}else { echo " - Erro ao deletar as imagens!"; }
}else{
	echo "Erro ao deletar o carro!";
}
?>

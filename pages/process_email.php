<?php
$nome = $_POST['nome1'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$assunto = $_POST['secretaria'];
$mensagem = $_POST['mensagens'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$arquivo = include("/modals/mailModals.php");

// -------------------------

//enviar

	// emails para quem será enviado o formulário
	$destino = EMAIL_ADDRESS;
	$assunto_stmp = $assunto;

	// É necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
  	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  	$headers .= 'From: $nome <$email>';
	//$headers .= "Bcc: $EmailPadrao\r\n";

	$enviaremail = mail($destino, $assunto_stmp, $arquivo, $headers);
	if($enviaremail){
		$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
		echo " <meta http-equiv='refresh' content='3;URL=http://ibiuna.esy.es/formsucessfull.html'>";
	} else {
		$mgm = " <meta http-equiv='refresh' content='3;URL=http://ibiuna.esy.es/formerror.html'>";
		echo "";
	}
?>

<?php
$nome = $_POST['nome1'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$assunto = $_POST['secretaria'];
$mensagem = $_POST['mensagens'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

$arquivo = "
<style type='text/css'>
body {
margin:0px;
font-family:Verdane;
font-size:12px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
</style>
<html>
	<table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
		<tr>
		  <td>
			<tr>
			 <td width='500'>Nome:$nome</td>
			</tr>
			<tr>
			  <td width='320'>E-mail:<b>$email</b></td>
			</tr>
			<tr>
			  <td width='320'>Telefone:<b>$telefone</b></td>
			</tr>
			<tr>
			  <td width='320'>Mensagem:$mensagem</td>
			</tr>
		</td>
	  </tr>
	  <tr>
		<td>Este e-mail foi enviado em <b>$data_envio</b> &agrave;s <b>$hora_envio</b></td>
	  </tr>
	</table>
</html>
";

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

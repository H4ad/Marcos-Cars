<?php
require_once('../inc/functions.php');
include(HEADER_TEMPLATE);
$result = (isset($_POST['result']))? $_POST['result'] : '';
$nome = (isset($_POST['nome']))? $_POST['nome'] : null;
$email = (isset($_POST['email']))? $_POST['email'] : null;
$telefone = (isset($_POST['telefone']))? $_POST['telefone'] : null;
$assunto = (isset($_POST['assunto']))? $_POST['assunto'] : null;
$mensagem = (isset($_POST['mensagem']))? $_POST['mensagem'] : null;
if($nome){
    if(addContact($nome, $email,$telefone,$assunto,$mensagem)){
        $result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" href=\"index.php\" style=\"color: white;\">Sucesso!</a></ul><meta http-equiv=\"refresh\" content=\"3\">";
    }else{
        $result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: red;\"><a class=\"home\" href=\"index.php\" style=\"color: white;\">Falha!</a></ul><meta http-equiv=\"refresh\" content=\"3\">";
    }
}
?>
<div class="clear"></div>
    <div class="login">
        <div class="wrap">
        <?php echo $result; ?>
	    <ul class="breadcrumb breadcrumb__t"><a class="home" href="index.php">Inicio</a>  / Contato</ul>
		    <div class="content-top">
			   <form method="POST" action="#" id="inline-validate">
    				<div class="to">
                        <input name="nome" type="text" class="text" placeholder="Nome:" required>
    				    <input name="email" type="text" class="text" placeholder="Email:" style="margin-left: 10px" required>
    				</div>
    				<div class="to">
                        <input name="telefone" type="text" class="text" placeholder="Telefone:" required>
    				 	<input name="assunto" type="text" class="text" placeholder="Assunto:" value="<?php echo isset($assunto)? $assunto : '';?>" style="margin-left: 10px" required>
    				</div>
    				<div class="text">
                        <textarea name="mensagem" placeholder="Mensagem:" required></textarea>
                    </div>
                    <div class="submit">
                 	    <a class="btn btn-theme" type="button" data-toggle="modal" href="#alterEmail">Enviar</a>
                    </div>
                    <!-- Modal Recover Email -->
                	  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="alterEmail" class="modal fade">
                		  <div class="modal-dialog">
                			  <div class="modal-content">
                				  <div class="modal-header">
                					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                					  <h2 class="modal-title">Aviso!</h2>
                				  </div>
                				  <div class="modal-body">
                					  <h3>Você tem certeza que deseja mandar esse formulario ?</h3>
                				  </div>
                				  <div class="modal-footer">
                					  <button data-dismiss="modal" class="btn btn-default" type="button">Não</button>
                					  <button class="btn btn-theme" type="submit">Sim</button>
                				  </div>
                			  </div>
                		  </div>
                	  </div>
                	<!-- modal recover Email-->
                </form>
                <div class="map">
                    <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.8644915241766!2d-47.504489885023325!3d-23.501389884712744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58b339d15c6d7%3A0x76395cfaf3d2bcd1!2sMarcio+Multimarcas!5e0!3m2!1spt-BR!2sbr!4v1482991744828" style="border:0" allowfullscreen></iframe>
    			</div>
            </div>
        </div>
    </div>
    <?php include(FOOTER_TEMPLATE); ?>

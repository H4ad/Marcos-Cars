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
    				 	<input name="assunto" type="text" class="text" placeholder="Assunto:" style="margin-left: 10px" required>
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
    				<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
    			</div>
            </div>
        </div>
    </div>
    <?php include(FOOTER_TEMPLATE); ?>

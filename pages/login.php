<?php
require_once('../inc/config.php');
include(HEADER_TEMPLATE);

$process_sair = "
				<form action=\"process_sair.php\" method=\"POST\">
				<h4 class=\"title\">Sair</h4>
				<div class=\"col_1_of_2\">
					<div class=\"remember\">
						<button class=\"btn btn-danger\" type=\"submit\">Sair</button>
						<div class=\"clear\"></div>
					</div>
				</div>";

$process_login = "
				<form action=\"process_login.php\" method=\"POST\">
				<h4 class=\"title\">Entrar</h4>
				<div class=\"col_1_of_2 col-lg-6\">
					<label for=\"modlgn_username\">Usuario</label>
					<div><input id=\"modlgn_username\" type=\"text\" name=\"user\" class=\"text\" autocomplete=\"off\"></div>
					<label for=\"modlgn_passwd\">Senha</label>
					<div><input id=\"modlgn_passwd\" type=\"password\" name=\"pass\" class=\"text\" autocomplete=\"off\"></div>
					<div class=\"remember\">
						<button class=\"btn btn-success\" type=\"submit\">Logar</button>
						<div class=\"clear\"></div>
					</div>
				</div>";


?>
<div class="clear"></div>
</div>
  <div class="login">
    <div class="wrap" style="box-shadow:0 0 5px #aaa;">
			<div class="register_account col-lg-12">
				<?php
					//Logado vem do Header
					if($logado){
						echo $process_sair;
					}else{
						echo $process_login;
					}
				?>
			  </form>
		  </div>
	    <div class="clear"></div>
    </div>
  </div>
<?php include(FOOTER_TEMPLATE); ?>

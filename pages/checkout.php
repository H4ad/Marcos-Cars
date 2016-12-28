<?php require_once('../config.php'); ?>
<?php include(HEADER_TEMPLATE); ?>
<div class="register_account">
  <div id="main" class="container-fluid">

  <h3 class="page-header">Adicionar item para a venda.</h3>

  <form action="insert.php" method="POST" enctype="multipart/form-data">
  	<div class="row">
  	  <div class="form-group col-md-4">
  	  	<label for="name">Nome</label>
  	  	<input id="name" type="text" class="form-control" name="name" placeholder="Informe seu nome." required>
  	  </div>
	  <div class="form-group col-md-2">
  	  	<label for="cpf_cnpj">CPF</label>
  	  	<input type="text" class="form-control" name="cpf_cnpj" size="12" maxlength="14" placeholder="000.000.000-00">
  	  </div>
	</div>

	<div class="row">
  	  <div class="form-group col-md-5">
  	  	<label for="message">Mensagem</label>
  	  	<input type="text" class="form-control" name="message" placeholder="Escreva uma mensagem" required>
  	  </div>
	</div>

	<div class="row">
		<div class="form-group col-md-3">
            <div class="body">
			<div class="form-panel">
                <!--<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">-->
                    <div class="form-group">
                        <label class="control-label col-2">Image de perfil</label>
                        <div class="form-group">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 400px; height: 350px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 350px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Selecionar Imagem</span><span class="fileupload-exists">Alterar</span><input name="fileUpload" type="file" /></span>
                                     <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
									<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
									<!--<button class="btn btn-success fileupload-exists" type="submit">Enviar</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                <!--</form>-->
			</div>
            </div>
		</div>
	</div>

	<hr />

	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Cadastrar</button>
		<a href="index.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>


  </form>
 </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
<?php
   if(isset($_FILES['fileUpload']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = '../images/produtos/'; //Diretório para uploads

      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   }
?>

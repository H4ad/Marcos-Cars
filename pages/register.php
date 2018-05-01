<?php
require_once('../inc/config.php');
require_once('../classes/autoloader.php');
Autoloader::init();

$script = "<!-- FileUpload CSS --><link rel=\"stylesheet\" href=\"../css/bootstrap-fileupload.min.css\" /><script src=\"../js/jquery.js\"></script>";
include(HEADER_TEMPLATE);

if(!$logado) { header("Location: index.php"); }

$result = "";

$resultSuccess = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" style=\"color: white;\">Sucesso!</a></ul><meta http-equiv=\"refresh\" content=\"60\">";

$resultImgFail = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" style=\"color: white;\">Sucesso ao cadastrar o carro, mas não foi possivel cadastrar a imagem.</a></ul><meta http-equiv=\"refresh\" content=\"60\">";

$resultFail = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: red;\"><a class=\"home\" style=\"color: white;\">Falha!</a></ul><meta http-equiv=\"refresh\" content=\"60\">";

if(isset($_POST['nome'])){
	if(Produtos::add($_POST['nome'],
					 $_POST['preco'],
					 $_POST['ano'],
					 $_POST['km'],
					 $_POST['cor'],
					 $_POST['portas'],
					 $_POST['combustivel'],
					 $_POST['cambio'],
					 $_POST['final_placa'],
					 $_POST['carroceria'],
					 $_POST['observacoes'],
					 $_POST['detalhes'])
	){
		$car = Produtos::getLastCar();

		if(count($car) == 0){
			$result = $resultImgFail;
		}{
			if(Images::add($car[0]->getId(),
						   $_FILES[ 'fileUpload' ][ 'name' ],
						   $_FILES[ 'fileUpload' ][ 'tmp_name' ],
						   $_FILES[ 'fileUpload' ][ 'error' ])
			){
				$result = $resultSuccess;
			}else{
				$result = $resultImgFail;
			}
		}
  }else{
      $result = $resultFail;
  }
}

$footer = "<script src=\"../assets/plugins/jasny/js/bootstrap-fileupload.js\"></script>";

?>
<div class="clear"></div>
</div>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Cadastrar Carro</h4>
			  <?php echo $result; ?>
    		  <form action="#" method="POST" enctype="multipart/form-data">
    			 <div class="col_1_of_2 span_1_of_2" style="width: 31.2%;">
		   			 <div><input name="nome" type="text" class="text" placeholder="Modelo:" required></div>
		    			<div><input name="preco" type="number" class="text" placeholder="Preço:" required></div>
		    			<div><input name="ano" type="text" class="text" placeholder="Ano:" required></div>
		    			<div><input name="km" type="number" class="text" placeholder="Quilometragem:" required></div>
						  <div><input name="cor" type="text" class="text" placeholder="Cor:" required></div>
							<div class="register-area"><textarea name="detalhes" placeholder="Detalhes:" required></textarea></div>
							<button class="btn btn-success" type="submit">Cadastrar</button>
		    	 </div>
		    	 <div class="col_1_of_2 span_1_of_2" style="width: 31.2%;">
				      <div><input name="portas" type="number" class="text" placeholder="Portas:" required></div>
							<div>
								<select name="combustivel" class="frm-field required">
			            <option value="Nenhum">Selecionar um combustivel:</option>
									<option value="Gasolina">Gasolina</option>
									<option value="Alcool">Alcool</option>
									<option value="Etanol">Etanol</option>
									<option value="Eletrico">Eletrico</option>
			         </select>
						  </div>
							<div>
								<select name="cambio" class="frm-field required">
									<option value="Nenhum">Selecionar um cambio:</option>
									<option value="Manual">Manual</option>
									<option value="Automatico">Automatico</option>
									<option value="Automatizado">Automatizado</option>
									<option value="CVT">CVT</option>
							 </select>
							</div>
							<div>
								<select name="final_placa" class="frm-field required">
									<option value="0">Final da placa:</option>
									<?php for($i = 0; $i < 10; $i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
							 </select>
							</div>
							<div><input name="carroceria" type="text" class="text" placeholder="Carroceria:" required></div>
							<div class="register-area"><textarea name="observacoes" placeholder="Observações:" required></textarea></div>
		      </div>
					<div class="col_1_of_2 span_1_of_2" style="width: 31.2%;">
						<div class="form-panel">
							<div class="form-group">
									<div class="col-lg-10">
										<label class="control-label col-lg-14">Selecionar imagem</label>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="<?php echo IMAGE_PATCH . 'demoupload.jpg'; ?>" alt="" style="width: 300px; height: 250px;"/></div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 250px; line-height: 20px;"></div>
												<span class="btn btn-file btn-primary"><span class="fileupload-new">Selecionar imagem</span><span class="fileupload-exists">Trocar</span><input name="fileUpload" type="file" /></span>
											  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
												<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
										</div>
									</div>
								</div>
						</div>
					</div>
				  <div id="main" class="container-fluid" style="margin-top: 50px">
		    </form>
    	</div>
    </div>
	</div>
    <?php include(FOOTER_TEMPLATE); ?>

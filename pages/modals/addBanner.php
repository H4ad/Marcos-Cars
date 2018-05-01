<!-- Modal Adicione Foto -->
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addBanner" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Adicione uma foto</h2>
							</div>
							<div class="modal-body">
							<form action="" method="POST" enctype="multipart/form-data">
							<label class="control-label col-lg-14">Selecionar imagem</label>
							<div class="fileupload fileupload-new span_1_of_2" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="<?php echo IMAGE_PATCH . "demoupload.jpg"; ?>" style="width: 300px; height: 250px;"/></div>
									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 250px; line-height: 20px;"></div>
									<span class="btn btn-file btn-primary"><span class="fileupload-new">Selecionar imagem</span><span class="fileupload-exists">Trocar</span><input name="fileUpload" type="file" /></span>
									<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
									<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remover</a>
							</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="action" value="addImage">
								<input type="hidden" name="addid" value="1">
								<button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
								<button class="btn btn-theme" type="submit">Enviar</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			<!-- modal adicione uma foto -->

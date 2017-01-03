<!-- Modal Alterar uma Informação-->
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="1" id="alterInfo" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h2 class="modal-title">Alterar as informações de "Detalhes" e "Observações"</h2>
						</div>
						<form action="#" method="POST">
						<div class="modal-body">
							<div class="register_account">
								<h4 class="m_1">Detalhes</h4>
								<div class="register-area"><textarea name="detalhes" required><?php echo $car['detalhes']; ?></textarea></div>
								<h4 class="m_1">Observações</h4>
						  	<div class="register-area"><textarea name="observacoes" required><?php echo $car['observacoes']; ?></textarea></div>
						</div>
					  </div>
						<div class="modal-footer">
							<input type="hidden" name="action" value="alterDeOb">
							<input type="hidden" name="alterDeObId" value="<?php echo $car['id']; ?>">
							<button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
							<button class="btn btn-theme" type="submit">Enviar</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		<!-- modal alterar uma informação -->

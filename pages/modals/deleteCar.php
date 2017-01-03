<!-- Modal Deletar carro -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deleteCar" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title">Aviso!</h2>
				</div>
				<div class="modal-body">
					<h3>Você tem certeza que deseja deletar esse carro ?</h3>
				</div>
				<div class="modal-footer">
        <form action="#" method="POST" id="ajax_form_delete">
					<input type="hidden" name="id" value="<?php echo $car['id']; ?>">
					<button data-dismiss="modal" class="btn btn-default" type="button">Não</button>
					<button class="btn btn-theme" type="submit">Sim</button>
        </form>
				</div>
			</div>
		</div>
	</div>
<!-- modal deletar carro -->

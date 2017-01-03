<!-- Modal Deletar uma foto -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deleteFoto" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2 class="modal-title">Alterar uma informação</h2>
					</div>
					<div class="modal-body">
						<h3>Escolha uma foto a ser deletada</h3>
						<table>
						<form action="#" method="POST">
						<?php
						$images = getPatchFile($car['id']);
						if($images[0]['patch_file'] != "demoupload.jpg" && is_array($images)){
							foreach($images as $image){
							$string = $image['patch_file'];
								echo"
									<tr>
										<td><br><img src=\"../images/produtos/".$string."\" style=\"width: 100px;height: 100px;\"/></td>
										<td><br><input type=\"radio\" name=\"image\" value=\"".$string."\" checked>".$string."<br></td>
									</tr>";
					 		}
			 			}else{
							echo "<h4>Não há imagem a ser deletada</h4></form><form action=\"\">";
						}
					 	?>
						</table>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="action" value="deleteFoto">
						<input type="hidden" name="delid" value="<?php echo $car['id']; ?>">
						<button data-dismiss="modal" class="btn btn-default" type="button">Não</button>
						<button class="btn btn-theme" type="submit">Sim</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	<!-- modal deletar uma foto -->

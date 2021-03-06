﻿<?php
require_once("../inc/config.php");
require_once("../classes/autoloader.php");
Autoloader::init();

$script = "
<script src=\"../js/jquery.js\"></script>
<script type=\"text/javascript\">
	jQuery(document).ready(function(){
		jQuery('#ajax_form_delete').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: \"POST\",
				url: \"process_delete.php\",
				data: dados,
				success: function( data )
				{
					alert( data );
					location.href = \"management.php\";
				}
			});

			return false;
		});
	});
</script>";
include(HEADER_TEMPLATE);

if(!$logado){
	header("Location: index.php");
}

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

if(!is_numeric($pagina)){
	$pagina = 1;
}

$orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "`id` ASC";
$carsperpage = (isset($_GET['carsperpage']))? $_GET['carsperpage'] : 15;

if(!is_numeric($carsperpage)){
	$carsperpage = 15;
}

$produtos = [];

if(isset($_GET['busca'])){
	$produtos = Produtos::find($_GET['busca'], $orderby, $pagina, $carsperpage);
}else {
	$produtos = Produtos::pagination($orderby, $pagina, $carsperpage);
}


?>
<div class="clear"></div>
</div>
<div class="mens">
  <div class="main">
    <div class="wrap" style="box-shadow:0 0 5px #aaa;">
	    <div id="top" class="row col-lg-12">
				<div class="col-sm-3">
					<h2>Itens</h2>
				</div>
				<div class="col-sm-6">
					<form method="get" action="management.php">
					<div class="input-group h2">
						<input name="busca" class="form-control" id="search" type="text" placeholder="Pesquisar Carro">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					</form>
				</div>
				<div class="col-sm-3">
					<a href="register.php" class="btn btn-primary pull-right h2" style="margin-right:5px;">Novo Carro</a>
				</div>
		  </div> <!-- /#top -->
 			<hr />
 			<div id="list" class="row">
			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Preço</th>
							<th>Anunciado</th>
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
					<?php 	foreach($produtos as $produto) { ?>
								<tr>
									<td><?=$produto->getId()?></td>
									<td><?=$produto->getNome()?></td>
									<td><?=$produto->getPreco()?></td>
									<td><?=$produto->getDataAnuncio()?></td>
									<td class="actions" style="display: inline-flex;">
										<a style="padding-right: 10px; padding-left: 10px;">
											<form name="form1" method="get" action="single.php">
												<input type="hidden" name="id" value="<?=$produto->getId()?>" /> <!-- Esse var vai ser utilizado para identificar qual registro eu quero mudar -->
												<input class="btn btn-success btn-xs" type="submit" value="Visualizar">
											</form>
										</a>
										<a style="padding-right: 5px;">
											<form name="for2" method="get" action="single.php">
												<input type="hidden" name="id" value="<?=$produto->getId()?>" />
												<input class="btn btn-warning btn-xs" type="submit" value="Editar">
											</form>
										</a>
										<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal">Excluir</a>
										<!-- Modal -->
										<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
										  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
												  </div>
												  <div class="modal-body">Deseja realmente excluir este item?</div>
												  <div class="modal-footer">
														<form method="POST" action="#" id="ajax_form_delete">
															<input type="hidden" name="id" value="<?=$produto->getId()?>" />
															<input class="btn btn-primary" type="submit" name="edit" value="Sim">
														</form>
													  <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
												  </div>
												</div>
										  </div>
										</div>
									</td>
								</tr>
					<?php   } ?>
			    </tbody>
				</table>
				<div class="col-lg-4">
					<!-- Pagination -->
					<nav>
						<ul class="pagination">
							<li>
								<a href="management.php?pagina=1&busca=<?php echo $busca; ?>&carsperpage=<?php echo $carsperpage; ?>&orderby=<?php echo $orderby; ?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<?php
								$numPaginas = ceil(count($produtos)/$carsperpage);

								for($i = 1; $i < $numPaginas + 1; $i++) {
									$estilo = "";
									if($pagina == $i)
										$estilo = "class=\"active\"";
							?>
							<li <?php echo $estilo; ?> ><a href="management.php?pagina=<?php echo $i; ?>&busca=<?php echo $busca; ?>&carsperpage=<?php echo $carsperpage; ?>&orderby=<?php echo $orderby; ?>"><?php echo $i; ?></a></li>
							<?php } ?>
							<li>
								<a href="management.php?pagina=<?php echo $i-1; ?>&busca=<?php echo $busca; ?>&carsperpage=<?php echo $carsperpage; ?>&orderby=<?php echo $orderby; ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>
					<!-- Pagination -->
				</div>
		  </div>
	  </div>
  </div>
</div>
		<?php include(FOOTER_TEMPLATE); ?>

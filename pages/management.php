<?php
require_once('../inc/functions.php');
include(HEADER_TEMPLATE);
if(!$logado) { header("Location: index.php"); }
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
if(!is_numeric($pagina)) { $pagina = 1; }
$orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "`id` ASC";
$carsperpage = (isset($_GET['carsperpage']))? $_GET['carsperpage'] : 15;
if(!is_numeric($carsperpage)) { $carsperpage = 15; }
$busca = (isset($_GET['busca']))? $_GET['busca'] : null;
if($busca){
	buttonAsk($busca,$orderby,$pagina,$carsperpage);
}else {
	loadCars(null,null,countCars(),$orderby,$pagina,$carsperpage);
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
					<a href="register.php" class="btn btn-primary pull-right h2">Novo Carro</a>
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
					<?php	foreach($produtos as $produto) { ?>
					<tr>
						<td><?=$produto['id']?></td>
						<td><?=$produto['nome']?></td>
						<td><?=$produto['preco']?></td>
						<td><?=$produto['data_anuncio']?></td>
						<td class="actions" style="display: inline-flex;">
							<a style="padding-right: 10px; padding-left: 10px;">
								<form name="form1" method="get" action="single.php">
									<input type="hidden" name="id" value="<?=$produto['id']?>" /> <!-- Esse var vai ser utilizado para identificar qual registro eu quero mudar -->
									<input class="btn btn-success btn-xs" type="submit" value="Visualizar">
								</form>
							</a>
							<a style="padding-right: 5px;">
								<form name="for2" method="post" action="edit.php">
									<input type="hidden" name="edita" value="<?=$produto['id']?>" />
									<input class="btn btn-warning btn-xs" type="submit" name="edit" value="Editar">
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
											<form name="for3" method="post" action="excluir.php">
												<input type="hidden" name="exclui" value="<?=$produto['id']?>" />
												<input class="btn btn-primary" type="submit" name="edit" value="Sim">
											</form>
										  <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
									  </div>
									</div>
							  </div>
							</div>
						</td>
					</tr>
				  <?php  }  ?>
			    </tbody>
				</table>
				<div class="col-lg-4">
					<!-- Pagination -->
					<nav>
						<ul class="pagination">
							<li>
								<a href="other.php?pagina=1&busca=<?php echo $busca; ?>&carsperpage=<?php echo $carsperpage; ?>&orderby=<?php echo $orderby; ?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<?php
								$numPaginas = ceil(countCars()/$carsperpage);
								for($i = 1; $i < $numPaginas + 1; $i++) {
								$estilo = "";
								if($pagina == $i)
									$estilo = "class=\"active\"";
							?>
							<li <?php echo $estilo; ?> ><a href="other.php?pagina=<?php echo $i; ?>&busca=<?php echo $busca; ?>&carsperpage=<?php echo $carsperpage; ?>&orderby=<?php echo $orderby; ?>"><?php echo $i; ?></a></li>
							<?php } ?>
							<li>
								<a href="other.php?pagina=<?php echo $i-1; ?>&busca=<?php echo $busca; ?>&carsperpage=<?php echo $carsperpage; ?>&orderby=<?php echo $orderby; ?>" aria-label="Next">
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
		  <script src="js/jquery.easydropdown.js"></script>
		<?php include(FOOTER_TEMPLATE); ?>

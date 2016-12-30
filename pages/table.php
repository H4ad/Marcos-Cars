<?php
require_once 'config.php';
require_once DBAPI;

error_reporting(0);
ini_set(“display_errors”, 0 );

// definições de host, database, usuário e senha
$db   = DB_NAME;
$host = DB_HOST;
$user = DB_USER;
$pass = DB_PASSWORD;
// conecta ao banco de dados
$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
// seleciona a base de dados em que vamos trabalhar
mysql_select_db($db, $con);

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$busca = (isset($_GET['busca']))? $_GET['busca'] : "";

//seleciona todos os itens da tabela
if($busca == "")
{
	$cmd = "SELECT id, message, name, created FROM customers ORDER BY id ASC";
	$linhas = mysql_query($cmd);
	//conta o total de itens
	$total = mysql_num_rows($linhas);

	//seta a quantidade de itens por página, neste caso, 2 itens
	$registros = 15;

	//calcula o número de páginas arredondando o resultado para cima
	$numPaginas = ceil($total/$registros);

	//variavel para calcular o início da visualização com base na página atual
	$inicio = ($registros*$pagina)-$registros;

	//seleciona os itens por página
	$cmd = "select * from customers ORDER BY id ASC limit $inicio,$registros";
	$linhas = mysql_query($cmd);
	$total = mysql_num_rows($dados);
}
else
{
	$cmd = "SELECT * FROM customers WHERE id LIKE '$busca' OR name LIKE '%$busca%' OR message LIKE '%$busca%' OR cpf_cnpj LIKE '$busca' OR birthdate LIKE '$busca' OR address LIKE '%$busca%' OR hood LIKE '%$busca%' OR zip_code LIKE '$busca' OR city LIKE '%$busca%' OR state LIKE '%$busca%' OR phone LIKE '$busca' OR mobile LIKE '$busca' OR ie LIKE '%$busca%' OR 'created' LIKE '$busca' OR modified LIKE '$busca' ORDER BY id ASC";
	$linhas = mysql_query($cmd);
	//conta o total de itens
	$total = mysql_num_rows($linhas);

	//seta a quantidade de itens por página, neste caso, 2 itens
	$registros = 15;

	//calcula o número de páginas arredondando o resultado para cima
	$numPaginas = ceil($total/$registros);

	//variavel para calcular o início da visualização com base na página atual
	$inicio = ($registros*$pagina)-$registros;

	//seleciona os itens por página
	$cmd = "SELECT * FROM customers WHERE id LIKE '$busca' OR name LIKE '%$busca%' OR message LIKE '%$busca%' OR cpf_cnpj LIKE '$busca' OR birthdate LIKE '$busca' OR address LIKE '%$busca%' OR hood LIKE '%$busca%' OR zip_code LIKE '$busca' OR city LIKE '%$busca%' OR state LIKE '%$busca%' OR phone LIKE '$busca' OR mobile LIKE '$busca' OR ie LIKE '%$busca%' OR 'created' LIKE '$busca' OR modified LIKE '$busca' ORDER BY id ASC limit $inicio,$registros";
	$linhas = mysql_query($cmd);
	$total = mysql_num_rows($dados);
	}
?>
<?php include(HEADER_TEMPLATE); ?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script src="../js/jquery1.min.js"></script>
<!-- start menu -->
			<div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Itens</h2>
		</div>
		<div class="col-sm-6">
			<form method="get" action="index.php">
			<div class="input-group h2">
				<input name="busca" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			</form>
		</div>
		<div class="col-sm-3">
			<a href="add.php" class="btn btn-primary pull-right h2">Novo Item</a>
		</div>
	</div> <!-- /#top -->
 
 	<hr />
 	<div id="list" class="row">
	
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Modelo</th>
					<th>Situação do veículo</th>
					<th>Portas</th>
					<th>quilometragem</th>
					<th>Marca</th>
					<th>Ano de fabricação</th>
					<th>Versão</th>
					<th>Placa</th>
					<th class="actions">Opcionais</th>
				</tr>
			</thead>
			<tbody>
					<?php
							// se o número de resultados for maior que zero, mostra os dados
							while ($linha = mysql_fetch_array($linhas)) {
						?>
								<tr>
									<td><?=$linha['id']?></td>
									<?php $var = $linha['id']; ?>
									<td><?=$linha['name']?></td>
									<td><?=$linha['created']?></td>
									<td><?=$linha['message']?></td>
									<td class="actions" style="display: inline-flex;">
										<a style="padding-right: 10px; padding-left: 10px;">
											<form name="form1" method="post" action="view.php">
												<input type="hidden" name="visualisa" value="'<?php echo $var ?>'" /> <!-- Esse var vai ser utilizado para identificar qual registro eu quero mudar -->
												<input class="btn btn-success btn-xs" type="submit" name="view" value="Visualizar">
											</form>
										</a>
										<a style="padding-right: 5px;">
											<form name="for2" method="post" action="edit.php">
												<input type="hidden" name="edita" value="'<?php echo $var ?>'" />
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
											  <div class="modal-body">
												Deseja realmente excluir este item?
											  </div>
											  <div class="modal-footer">
												<form name="for3" method="post" action="excluir.php">
												<input type="hidden" name="exclui" value="'<?php echo $var ?>'" />
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
	</div>
	</div> <!-- /#list -->
	<!-- Pagination -->
	<nav>
	  <ul class="pagination">
		<li>
		  <a href="index.php?pagina=1&busca=<?php echo $busca;?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<?php 
		for($i = 1; $i < $numPaginas + 1; $i++) {
		$estilo = "";
		if($pagina == $i)
			$estilo = "class=\"active\"";
		?>
		<li <?php echo $estilo; ?> ><a href="index.php?pagina=<?php echo $i; ?>&busca=<?php echo $busca;?>"><?php echo $i; ?></a></li>
		<?php } ?>
		<li>
		  <a href="index.php?pagina=<?php echo $i-1; ?>&busca=<?php echo $busca;?>" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
	  </ul>
	</nav>
	<!-- Pagination -->			
	<!-- Modal -->
	<div class="modal fade" id="pesquisar" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalLabel">Pesquisar Item</h4>
				  </div>
				  <div class="modal-body">
					Desculpe, mas esse botão não funciona.
				  </div>
				  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				  </div>
				</div>
			  </div>
	  </div>
	<!-- End Modal -->
		       <script src="../js/jquery.easydropdown.js"></script>
		      </div
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		<?php include(FOOTER_TEMPLATE); ?>

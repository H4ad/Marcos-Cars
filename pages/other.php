<?php
require_once('../inc/functions.php');
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$orderby = (isset($_POST['orderby']))? $_POST['orderby'] : "`id` DESC";
$reg = (isset($_POST['carsperpage']))? $_POST['carsperpage'] : 15;
$busca = (isset($_GET['busca']))? $_GET['busca'] : null;
if($busca){
	buttonAsk($busca,$orderby,$pagina,$reg);
}else {
	loadCars(null,null,countCars(),$orderby,$pagina,$reg);
}
include(HEADER_TEMPLATE);
$k = 0;
?>
<div class="mens">
  <div class="main">
     <div class="wrap">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Todos á venda</h2>
		  	<div class="mens-toolbar">
          <div class="sort">
            <div class="sort-by">
              <form action="#" method="post">
		            <label>Organizar por</label>
		            <select name="orderby" onchange="this.form.submit()">
									<option value="`produtos`.`id` DESC">-</option>
									<option value="`produtos`.`id` DESC">Recente</option>
									<option value="`produtos`.`id` ASC">Antigo</option>
		              <option value="`produtos`.`nome` ASC">Nome</option>
		              <option value="`produtos`.`preco` DESC">Maior preço</option>
									<option value="`produtos`.`preco` ASC">Menor preço</option>
		            </select>
            	</form>
          </div>
    		</div>
        <div class="pager">
        	<div class="limiter visible-desktop">
						<form action="#" method="post">
            <label>Mostrar</label>
            <select name="carsperpage" onchange="this.form.submit()">
							<option value="15">-</option>
							<option value="3">3</option>
              <option value="6">6</option>
              <option value="9">9</option>
							<option value="12">12</option>
							<option value="15">15</option>
            </select> Por Pagina
					  </form>
          </div>
	   		<div class="clear"></div>
    	</div>
     	<div class="clear"></div>
	    </div>
			<?php for($z = 1; $z <= ($reg/3); $z++) { ?>
			<div class="top-box">
				<?php for($i = 1; $i < 4; $i++) { ?>
				<?php if(!isset($produtos[$k]['id'])) { continue; } ?>
				<div class="col_1_of_3 span_1_of_3">
					 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/produtos/<?php echo isset($produtos[$k]['id'])? getPatchFile($produtos[$k]['id']) : 'demoUpload.jpg'; ?>" alt=""/>
					</div>
						<div class="price">
						 <div class="cart-left">
							 <p class="title"><?php echo isset($produtos[$k]['nome'])? $produtos[$k]['nome'] : 'Adicione algum produto!'; ?></p>
								<div class="price1">
									<span class="actual"><?php echo isset($produtos[$k]['preco'])? $produtos[$k]['preco'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
						</div>
						</a>
				</div>
				<?php $k++; } ?>
				<div class="clear"></div>
			</div>
			<?php } ?>
			<div class="tob-box">
				<!-- Pagination -->
	<nav>
	  <ul class="pagination">
		<li>
		  <a href="other.php?pagina=1" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<?php
		for($i = 1; $i < countCars() + 1; $i++) {
		$estilo = "";
		if($pagina == $i)
			$estilo = "class=\"active\"";
		?>
		<li <?php echo $estilo; ?> ><a href="other.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php } ?>
		<li>
		  <a href="other.php?pagina=<?php echo $i-1; ?>" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
	  </ul>
	</nav>
	<!-- Pagination -->
			</div>
		  </div>
		      </div>
			  <div class="clear"></div>
			</div>
		   </div>
		</div>
		<script src="js/jquery.easydropdown.js"></script>
	<?php include(FOOTER_TEMPLATE); ?>

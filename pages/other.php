<?php
error_reporting(0);
ini_set("display_errors", 0 );

require_once('../inc/functions.php');
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
if(!is_numeric($pagina)) { $pagina = 1; }
$orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "`id` DESC";
$carsperpage = (isset($_GET['carsperpage']))? $_GET['carsperpage'] : 15;
if(!is_numeric($carsperpage)) { $carsperpage = 15; }
$busca = (isset($_GET['busca']))? $_GET['busca'] : null;
if($busca){
	buttonAsk($busca,$orderby,$pagina,$carsperpage);
}else {
	loadCars(null,null,get_car_id_last(),$orderby,$pagina,$carsperpage);
}
include(HEADER_TEMPLATE);
$k = 0;
?>
	<div class="header-bottom-right">
	 <form action="#" method="GET">
	 <div class="search">
		 <input type="text" name="busca" class="textbox" value="Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar';}">
		 <input type="submit" id="submit">
		 <div id="response"> </div>
	</div>
	</form>
	</div>
	<div class="clear"></div>
</div>
<div class="mens">
  <div class="main">
     <div class="wrap">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Todos á venda</h2>
		  	<div class="mens-toolbar">
          <div class="sort">
            <div class="sort-by">
              <form action="#" method="GET">
		            <label>Organizar por</label>
		            <select name="orderby" onchange="this.form.submit()">
									<option value="`id` ASC">-</option>
									<option value="`id` DESC">Recente</option>
									<option value="`id` ASC">Antigo</option>
		              <option value="`nome` ASC">Nome</option>
		              <option value="`preco` DESC">Maior preço</option>
									<option value="`preco` ASC">Menor preço</option>
		            </select>
								<input type="hidden" name="busca" value="<?php echo $busca; ?>">
								<input type="hidden" name="carsperpage" value="<?php echo $carsperpage; ?>">
								<input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
            	</form>
          </div>
    		</div>
        <div class="pager">
        	<div class="limiter visible-desktop">
						<form action="#" method="GET">
            <label>Mostrar</label>
            <select name="carsperpage" onchange="this.form.submit()">
							<option value="15">-</option>
							<option value="3">3</option>
              <option value="6">6</option>
              <option value="9">9</option>
							<option value="12">12</option>
							<option value="15">15</option>
            </select> Por Pagina
						<input type="hidden" name="busca" value="<?php echo $busca; ?>">
						<input type="hidden" name="orderby" value="<?php echo $orderby; ?>">
						<input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
					  </form>
          </div>
	   		<div class="clear"></div>
    	</div>
     	<div class="clear"></div>
	    </div>
			<?php for($z = 1; $z <= ($carsperpage/3); $z++) { ?>
			<div class="top-box">
				<?php for($i = 1; $i < 4; $i++) {
			  if(!isset($produtos[$k]['id'])) { continue; }
        $img = getPatchFile($produtos[$k]['id'],1); $img = $img[0]['patch_file'];
        ?>
				<div class="col_1_of_3 span_1_of_3">
					 <a href="single.php?id=<?php echo $produtos[$k]['id']; ?>">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/produtos/<?php echo isset($img)? $img : 'demoupload.jpg'; ?>" alt=""/>
					</div>
						<div class="price">
						 <div class="cart-left">
							 <p class="title"><?php echo isset($produtos[$k]['nome'])? $produtos[$k]['nome'] : 'Adicione algum produto!'; ?></p>
								<div class="price1">
									<span class="actual">R$ <?php echo isset($produtos[$k]['preco'])? $produtos[$k]['preco'] : '0'; ?></span>
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
			  <div class="clear"></div>
			</div>
		   </div>
		</div>
		<script src="../js/jquery.easydropdown.js"></script>
	<?php include(FOOTER_TEMPLATE); ?>

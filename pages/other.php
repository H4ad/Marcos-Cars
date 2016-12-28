<?php require_once('../inc/functions.php'); ?>
<?php loadCarsHome(); ?>
<?php include(HEADER_TEMPLATE); ?>
<div class="mens">
  <div class="main">
     <div class="wrap">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Todos em estoque</h2>
		  	<div class="mens-toolbar">
              <div class="sort">
               	<div class="sort-by">
		            <label>Organizar por</label>
		            <select>
		              <option value="">Nome</option>
		              <option value="">Preço</option>
		            </select>
		            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
               </div>
    		</div>
        <div class="pager">
        	<div class="limiter visible-desktop">
            <label>Mostrar</label>
            <select>
              <option value="" selected="selected">9</option>
              <option value="">15</option>
              <option value="">30</option>
              </select> Por Pagina
             </div>
       		<ul class="dc_pagination dc_paginationA dc_paginationA06">
			    <li><a href="#" class="previous">Paginas</a></li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
		  	</ul>
	   		<div class="clear"></div>
    	</div>
     	<div class="clear"></div>
	    </div>
			<?php for($z = 1; $z < 6; $z++) { ?>
			<div class="top-box">
				<?php for($i = 1; $i < 4; $i++) { ?>
				<div class="col_1_of_3 span_1_of_3">
					 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/produtos/<?php echo isset($produtos[$i*$z-1]['id'])? getPatchFile($produtos[$i*$z-1]['id']) : 'demoUpload.jpg'; ?>" alt=""/>
					</div>
						<div class="price">
						 <div class="cart-left">
							 <p class="title"><?php echo isset($produtos[$i*$z-1]['nome'])? $produtos[$i*$z-1]['nome'] : 'Adicione algum produto!'; ?></p>
								<div class="price1">
									<span class="actual"><?php echo isset($produtos[$i*$z-1]['preco'])? $produtos[$i*$z-1]['preco'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
						</div>
						</a>
				</div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			<?php } ?>
		  </div>
		      </div>
			  <div class="clear"></div>
			</div>
		   </div>
		</div>
		<script src="js/jquery.easydropdown.js"></script>
	<?php include(FOOTER_TEMPLATE); ?>

<?php
	require_once('../inc/functions.php');
	loadCarsHome();
	loadNewCars();
	include(HEADER_TEMPLATE);
	$k = 0;
	$img = '';
?>
<div class="clear"></div>
	</div>
  <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
					<?php $banners = getPatchBanner('1'); ?>
					<?php foreach($banners as $banner){ ?>
						<div class="slide">
                <!-- Slide image -->
								<div class="banner_image">
                	<img src="../images/<?php echo $banner['patch_file']; ?>" alt="" />
							  </div>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <!-- <h4 class="title">Aluminium Club</h4> -->
                        <!-- /Text title -->

                        <!-- Text description -->
                        <!-- <p class="description">Experiance ray ban</p> -->
                        <!-- /Text description -->
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!--/slide -->
					<?php } ?>
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Á venda</h2>
				<?php for($z = 1; $z <= 3; $z++) { ?>
					<div class="top-box">
						<?php for($i = 1; $i <= 3; $i++) {
						if(!isset($produtos[$k]['id'])) { $img = 'demoUpload.jpg';}
						else { $img = getPatchFile($produtos[$k]['id'],1); $img = $img[0]['patch_file'];}
						?>
						<div class="col_1_of_3 span_1_of_3">
							 <a href="single.php?id=<?php echo isset($produtos[$k]['id'])? $produtos[$k]['id'] : ''; ?>">
							<div class="inner_content clearfix">
							<div class="product_image">
								<img src="../images/produtos/<?php echo $img; ?>" alt=""/>
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
					</div>
					<div class="clear"></div>
			  <?php } ?>
	    <h2 class="head">Novos Carros</h2>
		    <div class="section group">
				<?php for($i = 0; $i < 3; $i++) {
				if(!isset($newsCars[$i]['id'])) { $img = 'demoUpload.jpg';}
				else { $img = getPatchFile($newsCars[$i]['id'],1); $img = $img[0]['patch_file']; }
				?>
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.php?id=<?php echo $newsCars[$i]['id']; ?>">
					<div class="inner_content clearfix">
				  <div class="product_image">
						<img src="../images/produtos/<?php echo $img; ?>" alt=""/>
					</div>
          <div class="sale-box"><span class="on_sale title_shop">Novos</span></div>
            <div class="price">
						  <div class="cart-left">
								<p class="title"><?php echo isset($newsCars[$i]['nome'])? $newsCars[$i]['nome'] : 'Adicione algum produto!'; ?></p>
								<div class="price1">
								  <span class="actual"><?php echo isset($newsCars[$i]['preco'])? $newsCars[$i]['preco'] : '0'; ?></span>
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
		</div>
			<div class="rsidebar span_1_of_left">
				<div class="top-border"> </div>
           <div class="top-border"> </div>
					 <div class="sidebar-bottom">
		 			    <h2 class="m_1">OFERECEMOS DESCONTOS EXCLUSIVOS PARA COMPRADORES DA REGIAO METROPOLITANA DE SOROCABA<br> </h2>
		 			    <h2 class="m_1">ENTRE EM CONTATO PARA MAIS DETALHES<br> </h2>
		 			</div>
	    </div>
	   <div class="clear"></div>
	</div>
	</div>
	</div>
	<?php include(FOOTER_TEMPLATE); ?>

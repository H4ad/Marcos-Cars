<?php
	require_once("../classes/autoloader.php");
	require_once("../inc/config.php");

	Autoloader::init();
	$car = new Produtos();

	include(HEADER_TEMPLATE);
	$k = 0;
?>
<div class="clear"></div>
	</div>
  <!-- start slider -->
	<div id="fwslider">
		<div class="slider_container">
					<?php $banners = Images::getImageById(1); ?>
					<?php foreach($banners as $banner){ ?>
						<div class="slide">
				<!-- Slide image -->
								<div class="banner_image">
					<img src="../images/<?php echo $banner->getPathFile(); ?>" alt="" />
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
				<?php 	$produtos = $car->loadCarsHome();
						for($z = 1; $z <= 3; $z++) {
				?>
					<div class="top-box">
						<?php for($i = 1; $i <= 3; $i++) {
								$img = Images::getImageById(isset($produtos[$k]) ? $produtos[$k]->getId() : 0);
								$img = count($img) > 0 ? $img[0]->getPathFile() : 'demoupload.jpg';
						?>
						<div class="col_1_of_3 span_1_of_3">
							<?php if(isset($produtos[$k])){
									echo "<a href=\"single.php?id="
										. isset($produtos[$k])? $produtos[$k]->getId() : get_car_id_last()
										. "\">";
								}
							?>
							<div class="inner_content clearfix">
							<div class="product_image">
								<img src="../images/produtos/<?php echo $img ?>" alt=""/>
							</div>
								<div class="price">
								 <div class="cart-left">
									 <p class="title"><?php echo isset($produtos[$k])? $produtos[$k]->getNome() : 'Sem carro a venda!'; ?></p>
										<div class="price1">
											<span class="actual">R$ <?php echo isset($produtos[$k])? $produtos[$k]->getPreco() : '0'; ?></span>
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
				<?php	$newsCars = $car->loadNewCars();
						for($i = 0; $i < 3; $i++) {
							if(isset($newsCars[$i])){
								$img = Images::getImageById($newsCars[$i]->getId());
								$img = count($img) > 0 ? $img[0]->getPathFile() : 'demoupload.jpg';
				?>
				<div class="col_1_of_3 span_1_of_3">
					<a href="single.php?id=<?php echo $newsCars[$i]->id; ?>">
						<div class="inner_content clearfix">
							<div class="product_image">
								<img src="../images/produtos/<?php echo isset($img)? $img : 'demoupload.jpg'; ?>" alt=""/>
							</div>
							<div class="sale-box">
								<span class="on_sale title_shop">Novos</span>
							</div>
							<div class="price">
								<div class="cart-left">
									<p class="title"><?php echo $newsCars[$i]->getNome(); ?></p>
									<div class="price1">
										<span class="actual">R$ <?php echo $newsCars[$i]->getNome(); ?></span>
									</div>
								</div>
								<div class="cart-right"> </div>
								<div class="clear"></div>
							</div>
						</div>
					</a>
				</div>
				<?php 		}
						}
				?>
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

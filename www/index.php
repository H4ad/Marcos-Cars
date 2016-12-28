<?php
    require_once('inc/functions.php');
		loadProductHome();
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?=$config['site']['shopName'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>

<!-- FileUpload CSS -->
<link rel="stylesheet" href="../css/bootstrap-fileupload.min.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
		<link rel="stylesheet" href="../css/fwslider.css" media="all">
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/fwslider.js"></script>
<!--end slider -->
<script src="js/jquery.easydropdown.js"></script>
</head>
<body>
		 <div class="header-top">
		 <div class="wrap">
			 <div class="cssmenu">
				<ul>
					<li><a href="pages/login.php">Entrar</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-bottom">
			<div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=""/></a>
				</div>
				<div class="menu">
							<ul class="megamenu skyblue">
			<li class="active grid"><a href="index.php">Inicio</a></li>
				<li><a class="color6" href="pages/other.php">Localização</a></li>
				<li><a class="color7" href="pages/other.php">Contato</a></li>
			</ul>
			</div>
		</div>
		 <div class="header-bottom-right">
				 <div class="search">
				<input type="text" name="s" class="textbox" value="Pesquisar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>
		</div>
		 <div class="clear"></div>
		 </div>
	</div>

  <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide">
                <!-- Slide image -->
                    <img src="images/banner.jpg" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h4 class="title">Multimarcas</h4>
                        <!-- /Text title -->

                        <!-- Text description -->
                        <p class="description">Seminovos</p>
                        <!-- /Text description -->
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="images/banner1.jpg" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title">Multimarcas</h4>
                        <p class="description">Seminovos</p>
                    </div>
                </div>
            </div>
            <!--/slide -->
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
		  	<h2 class="head">Em estoque</h2>
			<div class="top-box">
			 <div class="col_1_of_3 span_1_of_3">
			   <a href="single.html">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic.jpg" alt=""/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
                   </div>
                 </a>
				</div>
			   <div class="col_1_of_3 span_1_of_3">
			   	 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic1.jpg" alt=""/>
					</div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="single.html">
				  <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic2.jpg" alt=""/>
					</div>
                    <div class="sale-box1"><span class="on_sale title_shop">Sale</span></div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="reducedfrom">$66.00</span>
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
                   </div>
                   </a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="top-box">
				<div class="col_1_of_3 span_1_of_3">
			  <a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic3.jpg" alt=""/>
					</div>
	          <div class="price">
					   <div class="cart-left">
							<p class="title"><?php echo isset($produtos['1']['nome'])? $produtos['1']['nome'] : 'Adicione algum produto!'; ?></p>
							<div class="price1">
							  <span class="actual"><?php echo isset($produtos['1']['preco'])? $produtos['1']['nome'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
	       </div>
			 	</a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				<a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic3.jpg" alt=""/>
					</div>
						<div class="price">
						 <div class="cart-left">
							 <p class="title"><?php echo isset($produtos['2']['nome'])? $produtos['2']['nome'] : 'Adicione algum produto!'; ?></p>
 							<div class="price1">
 							  <span class="actual"><?php echo isset($produtos['2']['preco'])? $produtos['2']['nome'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
				 </div>
				</a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				<a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic3.jpg" alt=""/>
					</div>
						<div class="price">
						 <div class="cart-left">
							<p class="title"><?php echo isset($produtos['3']['nome'])? $produtos['3']['nome'] : 'Adicione algum produto!'; ?></p>
 							<div class="price1">
 							  <span class="actual"><?php echo isset($produtos['3']['preco'])? $produtos['3']['nome'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
				 </div>
				</a>
				</div>
			</div>
			<div class="top-box1">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.html">
					<div class="inner_content clearfix">
				  <div class="product_image">
						<img src="images/pic6.jpg" alt=""/>
					</div>
          <div class="sale-box"><span class="on_sale title_shop">New</span></div>
            <div class="price">
						  <div class="cart-left">
								<p class="title"><?php echo isset($produtos['4']['nome'])? $produtos['4']['nome'] : 'Adicione algum produto!'; ?></p>
								<div class="price1">
								  <span class="actual"><?php echo isset($produtos['4']['preco'])? $produtos['4']['nome'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
          </div>
          </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic7.jpg" alt=""/>
					</div>
					 <div class="sale-box1"><span class="on_sale title_shop">Sale</span></div>
                    <div class="price">
					   <div class="cart-left">
							 <p class="title"><?php echo isset($produtos['5']['nome'])? $produtos['5']['nome'] : 'Adicione algum produto!'; ?></p>
 							<div class="price1">
 							  <span class="actual"><?php echo isset($produtos['5']['preco'])? $produtos['5']['nome'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
	         </div>
	         </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				  <a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic8.jpg" alt=""/>
					</div>
           	 <div class="sale-box"><span class="on_sale title_shop">New</span></div>
            <div class="price">
					   <div class="cart-left">
							 <p class="title"><?php echo isset($produtos['6']['nome'])? $produtos['6']['nome'] : 'Adicione algum produto!'; ?></p>
 							<div class="price1">
 							  <span class="actual"><?php echo isset($produtos['6']['preco'])? $produtos['6']['nome'] : '0'; ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
           </div>
           </a>
				</div>
				
				<div class="clear"></div>
			</div>
	        <h2 class="head">Novos Em Estoque</h2>
		    <div class="section group">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic5.jpg" alt=""/>
					</div>
             <div class="sale-box"><span class="on_sale title_shop">New</span></div>
            <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic2.jpg" alt=""/>
					</div>
					 <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/pic3.jpg" alt=""/>
					</div>
                   	 <div class="sale-box"><span class="on_sale title_shop">New</span></div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>
                   </div>
                   </a>
				</div>
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

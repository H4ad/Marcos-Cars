<?php
    require_once('inc/functions.php');
		loadCarsHome();
		loadNewCars();
?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title><?=$config['site']['shopName'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
		<link rel="stylesheet" href="css/fwslider.css" media="all">
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/fwslider.js"></script>
<!--end slider -->
<script src="js/jquery.easydropdown.js"></script>
</head>
<body>
		 <div class="header-top">
		 <div class="wrap">
				<!--
				<div class="header-top-left">
						 <div class="box">
								<select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Language :</option>
							<option value="1">English</option>
							<option value="2">French</option>
							<option value="3">German</option>
						</select>
							</div>
							<div class="box1">
									<select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Currency :</option>
							<option value="1">$ Dollar</option>
							<option value="2">€ Euro</option>
						</select>
							</div>
							<div class="clear"></div>
				 </div>
			 -->
			 <div class="cssmenu">
				<ul>
					<li class="active"><a href="pages/login.php">Account</a></li> |
					<li><a href="pages/checkout.php">Wishlist</a></li> |
					<li><a href="pages/checkout.php">Checkout</a></li> |
					<li><a href="pages/login.php">Log In</a></li> |
					<li><a href="pages/register.php">Sign Up</a></li>
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
			<li class="active grid"><a href="index.php">Home</a></li>
			<li><a class="color4" href="#">women</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Contact Lenses</h4>
								<ul>
									<li><a href="pages/womens.php">Daily-wear soft lenses</a></li>
									<li><a href="pages/womens.php">Extended-wear</a></li>
									<li><a href="pages/womens.php">Lorem ipsum </a></li>
									<li><a href="pages/womens.php">Planned replacement</a></li>
								</ul>
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Sun Glasses</h4>
								<ul>
									<li><a href="pages/womens.php">Heart-Shaped</a></li>
									<li><a href="pages/womens.php">Square-Shaped</a></li>
									<li><a href="pages/womens.php">Round-Shaped</a></li>
									<li><a href="pages/womens.php">Oval-Shaped</a></li>
								</ul>
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Eye Glasses</h4>
								<ul>
									<li><a href="pages/womens.php">Anti Reflective</a></li>
									<li><a href="pages/womens.php">Aspheric</a></li>
									<li><a href="pages/womens.php">Bifocal</a></li>
									<li><a href="pages/womens.php">Hi-index</a></li>
									<li><a href="pages/womens.php">Progressive</a></li>
								</ul>
							</div>
						</div>
						</div>
					</div>
				</li>
				<li><a class="color5" href="#">Men</a>
				<div class="megapanel">
					<div class="col1">
							<div class="h_nav">
								<h4>Contact Lenses</h4>
								<ul>
									<li><a href="mens.php">Daily-wear soft lenses</a></li>
									<li><a href="pages/mens.php">Extended-wear</a></li>
									<li><a href="pages/mens.php">Lorem ipsum </a></li>
									<li><a href="pages/mens.php">Planned replacement</a></li>
								</ul>
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Sun Glasses</h4>
								<ul>
									<li><a href="pages/mens.php">Heart-Shaped</a></li>
									<li><a href="pages/mens.php">Square-Shaped</a></li>
									<li><a href="pages/mens.php">Round-Shaped</a></li>
									<li><a href="pages/mens.php">Oval-Shaped</a></li>
								</ul>
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Eye Glasses</h4>
								<ul>
									<li><a href="pages/mens.php">Anti Reflective</a></li>
									<li><a href="pages/mens.php">Aspheric</a></li>
									<li><a href="pages/mens.php">Bifocal</a></li>
									<li><a href="pages/mens.php">Hi-index</a></li>
									<li><a href="pages/mens.php">Progressive</a></li>
								</ul>
							</div>
						</div>
					</div>
				</li>
				<li><a class="color6" href="pages/other.php">Other</a></li>
				<li><a class="color7" href="pages/other.php">Purchase</a></li>
			</ul>
			</div>
		</div>
		 <div class="header-bottom-right">
				 <div class="search">
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>
		<div class="tag-list">
			<ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c1" href="#"> </a>
				<ul class="sub-icon1 list">
					<li><h3>sed diam nonummy</h3><a href=""></a></li>
					<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
				</ul>
			</li>
		</ul>
		<ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c2" href="#"> </a>
				<ul class="sub-icon1 list">
					<li><h3>No Products</h3><a href=""></a></li>
					<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
				</ul>
			</li>
		</ul>
			<ul class="last"><li><a href="#">Cart(0)</a></li></ul>
		</div>
		</div>
		 <div class="clear"></div>
		 </div>
	</div>

  <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
					<?php $banners = getPatchBanner('1'); ?>
					<?php foreach($banners as $banner){ ?>
						<div class="slide">
                <!-- Slide image -->
                <img src="images/<?php echo $banner['patch_file']; ?>" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <!-- <h4 class="title">Aluminium Club</h4>-->
                        <!-- /Text title -->

                        <!-- Text description -->
                        <p class="description">Experiance ray ban</p>
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
		  	<h2 class="head">Featured Products</h2>
			<div class="top-box">
					<?php for($i = 0; $i < 3; $i++) { ?>
					<div class="col_1_of_3 span_1_of_3">
						 <a href="single.html">
						<div class="inner_content clearfix">
						<div class="product_image">
							<img src="images/produtos/<?php echo isset($produtos[$i]['id'])? getPatchFile($produtos[$i]['id']) : 'demoUpload.jpg'; ?>" alt=""/>
						</div>
							<div class="price">
							 <div class="cart-left">
								 <p class="title"><?php echo isset($produtos[$i]['nome'])? $produtos[$i]['nome'] : 'Adicione algum produto!'; ?></p>
									<div class="price1">
										<span class="actual"><?php echo isset($produtos[$i]['preco'])? $produtos[$i]['preco'] : '0'; ?></span>
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
			<div class="top-box">
				<?php for($i = 3; $i < 6; $i++) { ?>
				<div class="col_1_of_3 span_1_of_3">
				<a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/produtos/<?php echo isset($produtos[$i]['id'])? getPatchFile($produtos[$i]['id']) : 'demoUpload.jpg'; ?>" alt=""/>
					</div>
						<div class="price">
						 <div class="cart-left">
							 <p class="title"><?php echo isset($produtos[$i]['nome'])? $produtos[$i]['nome'] : 'Adicione algum produto!'; ?></p>
 							<div class="price1">
 							  <span class="actual"><?php echo isset($produtos[$i]['preco'])? $produtos[$i]['preco'] : '0'; ?></span>
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
			<div class="top-box">
				<?php for($i = 6; $i < 9; $i++) { ?>
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.html">
					<div class="inner_content clearfix">
				  <div class="product_image">
						<img src="images/produtos/<?php echo isset($produtos[$i]['id'])? getPatchFile($produtos[$i]['id']) : 'demoUpload.jpg'; ?>" alt=""/>
					</div>
          <div class="sale-box"></div>
            <div class="price">
						  <div class="cart-left">
								<p class="title"><?php echo isset($produtos[$i]['nome'])? $produtos[$i]['nome'] : 'Adicione algum produto!'; ?></p>
								<div class="price1">
								  <span class="actual"><?php echo isset($produtos[$i]['preco'])? $produtos[$i]['preco'] : '0'; ?></span>
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
			</div
		</div>
	    <h2 class="head">New Products</h2>
		    <div class="section group">
				<?php for($i = 0; $i < 3; $i++) { ?>
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.php">
					<div class="inner_content clearfix">
				  <div class="product_image">
						<img src="images/produtos/<?php echo isset($newsCars[$i]['id'])? getPatchFile($newsCars[$i]['id']) : 'demoUpload.jpg'; ?>" alt=""/>
					</div>
          <div class="sale-box"><span class="on_sale title_shop">New</span></div>
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

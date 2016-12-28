<?php require_once('../config.php'); ?>
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
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="../js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src="../js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
<link rel="stylesheet" href="../css/etalage.css">
<script src="../js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 360,
					thumb_image_height: 360,
					source_image_width: 900,
					source_image_height: 900,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
</head>
<body>
      
     <div class="clear"></div>
     </div>
	</div>
<div class="mens">
  <div class="main">
     <div class="wrap">
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="../images/s-img.jpg" class="img-responsive" />
									<img class="etalage_source_image" src="../images/s1.jpg" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="../images/s-img1.jpg" class="img-responsive" />
								<img class="etalage_source_image" src="../images/s2.jpg" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="../images/s-img2.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="../images/s3.jpg" class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="../images/s4.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="../images/s-img3.jpg" class="img-responsive"  />
							</li>
						</ul>
						 <div class="clearfix"></div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3">Lorem ipsum dolor sit amet</h3>
		             <p class="m_5">Rs. 888 <span class="reducedfrom">Rs. 999</span> <a href="#">click for offer</a></p>
		         	 <div class="btn_form">
						<form>
							<input type="submit" value="Entrar em contato" title="">
						</form>
					 </div>
				     <p class="m_text2">COLOCAR OS CADASTROS AQUI</p>
			     </div>
			   <div class="clear"></div>
	    <div class="clients">
	    <h3 class="m_3">Ver também</h3>
		 <ul id="flexiselDemo3">
			<li><img src="../images/s5.jpg" /><a href="#">Category</a><p>Rs 600</p></li>
			<li><img src="../images/s6.jpg" /><a href="#">Category</a><p>Rs 850</p></li>
			<li><img src="../images/s7.jpg" /><a href="#">Category</a><p>Rs 900</p></li>
			<li><img src="../images/s8.jpg" /><a href="#">Category</a><p>Rs 550</p></li>
			<li><img src="../images/s9.jpg" /><a href="#">Category</a><p>Rs 750</p></li>
		 </ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: {
		    		portrait: {
		    			changePoint:480,
		    			visibleItems: 1
		    		},
		    		landscape: {
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: {
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });

			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: false,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: {
		    		portrait: {
		    			changePoint:480,
		    			visibleItems: 1
		    		},
		    		landscape: {
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: {
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });

		});
	</script>
	<script type="text/javascript" src="../js/jquery.flexisel.js"></script>
     </div>
     <div class="toogle">
     	<h3 class="m_3">Detalhes</h3>
     	<p class="m_text">OU COLOCAR O CADASTRO AQUI</p>
     </div>
      </div>
			
		       <script src="../js/jquery.easydropdown.js"></script>
		      </div
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		<?php include(FOOTER_TEMPLATE); ?>

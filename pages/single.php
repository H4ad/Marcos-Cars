<?php require_once('../inc/functions.php');
$allcars = countCars();
$id = (isset($_GET['id']))? $_GET['id'] : $allcars;
loadCars(5,null,$allcars,"`id` DESC",null,null,$id);
$script="
<script>
        function getCar(id) {
					var local = \"single.php?id=\" + id;
          location.href = local;
        }
</script>
<script type=\"text/javascript\" src=\"../js/jquery.jscrollpane.min.js\"></script>
		<script type=\"text/javascript\" id=\"sourcecode\">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src=\"../js/slides.min.jquery.js\"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: '../images/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
<link rel=\"stylesheet\" href=\"../css/etalage.css\">
<script src=\"../js/jquery.etalage.min.js\"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 360,
					thumb_image_height: 360,
					source_image_width: 1080,
					source_image_height: 1080,
					show_hint: true,
				});

			});
	</script>";
	include(HEADER_TEMPLATE);
?>
<div class="clear"></div>
</div>
<div class="mens">
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / <a href="#">Dolor sit amet</a> / Lorem ipsum dolor sit amet</ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<img class="etalage_thumb_image" src="../images/s-img.jpg" class="img-responsive" />
								<img class="etalage_source_image" src="../images/s1.jpg" class="img-responsive" title="" />
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
							<input type="submit" value="buy" title="">
						</form>
					 </div>
					<span class="m_link"><a href="#">login to save in wishlist</a> </span>
				     <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p>
			     </div>
			   <div class="clear"></div>
	    <div class="clients">
	    <h3 class="m_3">Outros carros á venda</h3>
			<form action="#" method="GET">
		 <ul id="flexiselDemo3">
			<?php for($i = 0; $i < 10; $i++) {
			if(!isset($produtos[$i]['id'])){ continue; }
			$img = getPatchFile($produtos[$i]['id']) ?>
			<li onclick="getCar(<?php echo $produtos[$i]['id']; ?>)" >
				<img onclick="getCar(<?php echo $produtos[$i]['id']; ?>)" src="../images/produtos/<?php echo isset($img)? $img : 'demoUpload.jpg'; ?>" />
				<a onClick="getCar(<?php echo $produtos[$i]['id']; ?>)" ><?php echo isset($produtos[$i]['nome'])? $produtos[$i]['nome'] : '-'; ?></a>
			  <p onclick="getCar(<?php echo $produtos[$i]['id']; ?>)" ><?php echo isset($produtos[$i]['preco'])? $produtos[$i]['preco'] : '0'; ?></p>
			</li>
			<?php } ?>
		 </ul>
		 </form>
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
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
     <div class="toogle">
     	<h3 class="m_3">More Information</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
      </div>
			<div class="rsingle span_1_of_single">
				<div class="rsidebar span_3_of_left">
					<div class="top-border"> </div>
	           <div class="top-border"> </div>
						 <div class="sidebar-bottom">
			 			    <h2 class="m_1">OFERECEMOS DESCONTOS EXCLUSIVOS PARA COMPRADORES DA REGIAO METROPOLITANA DE SOROCABA<br> </h2>
			 			    <h2 class="m_1">ENTRE EM CONTATO PARA MAIS DETALHES<br> </h2>
			 			</div>
		    </div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		<?php include(FOOTER_TEMPLATE); ?>

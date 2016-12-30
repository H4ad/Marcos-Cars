<?php require_once('../inc/functions.php');
$allcars = countCars();
$id = (isset($_GET['id']))? $_GET['id'] : $allcars;
if($id == '' || $id == 1 || $id == 0 || !is_numeric($id)) { $id = $allcars; }
loadCars(5,null,$allcars,"`id` DESC",null,null,$id);
$car = getCar($id);
$script="
<script>
        function getCar(id) {
					var local = \"single.php?id=\" + id;
          location.href = local;
        }
				function gotoContact() {
					var local = \"contact.php\";
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
					thumb_image_height: 300,
					source_image_width: 1080,
					source_image_height: 1080,
					show_hint: false,
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
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Inicio</a> / <a href="other.php">Carros</a> / <?php echo $car['nome']; ?></ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
						<?php $imgCar = getPatchFile($car['id']);
						foreach($imgCar as $image){
						?>
							<li>
								<img class="etalage_thumb_image" src="../images/produtos/<?php echo $image['patch_file']; ?>" class="img-responsive" />
								<img class="etalage_source_image" src="../images/produtos/<?php echo $image['patch_file']; ?>" class="img-responsive" />
							</li>
						<?php } ?>
						</ul>
						 <div class="clearfix"></div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3"><?php echo $car['nome']; ?></h3>
		             <p class="m_5">R$ <?php echo $car['preco']; ?><a href="#"> - Anunciado em <?php echo $car['data_anuncio']; ?></a></p>
		         	 <div class="btn_form">
						<form action="contact.php" method="post">
							<input type="hidden" name="assunto" value="<?php echo $car['nome']; ?>">
							<input type="submit" value="Entre em contato!">
						</form>
					 </div>
				     <p class="m_text2"><?php echo $car['detalhes']; ?></p>
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
				<img onclick="getCar(<?php echo $produtos[$i]['id']; ?>)" src="../images/produtos/<?php echo isset($img[0]['patch_file'])? $img[0]['patch_file'] : 'demoUpload.jpg'; ?>" />
				<a onClick="getCar(<?php echo $produtos[$i]['id']; ?>)" ><?php echo isset($produtos[$i]['nome'])? $produtos[$i]['nome'] : '-'; ?></a>
			  <p onclick="getCar(<?php echo $produtos[$i]['id']; ?>)" >R$ <?php echo isset($produtos[$i]['preco'])? $produtos[$i]['preco'] : '0'; ?></p>
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
     	 <h3 class="m_3">Detalhes do Carro</h3>
       <table class="table table-striped" cellspacing="0" cellpadding="0">
        <tr>
          <td>Modelo</td>
          <td><?php echo $car['nome']; ?></td>
        </tr>
        <tr>
          <td>Ano</td>
          <td><?php echo $car['ano']; ?></td>
        </tr>
        <tr>
          <td>KM</td>
          <td><?php echo $car['km']; ?></td>
        </tr>
				<tr>
          <td>Cor</td>
          <td><?php echo $car['cor']; ?></td>
        </tr>
				<tr>
          <td>Portas</td>
          <td><?php echo $car['portas']; ?></td>
        </tr>
				<tr>
          <td>Combustivel</td>
          <td><?php echo $car['combustivel']; ?></td>
        </tr>
				<tr>
          <td>Cambio</td>
          <td><?php echo $car['cambio']; ?></td>
        </tr>
				<tr>
          <td>Final da placa</td>
          <td><?php echo $car['final_placa']; ?></td>
        </tr>
				<tr>
          <td>Carroceria</td>
          <td><?php echo $car['carroceria']; ?></td>
        </tr>
      </table>
     	</div>
     <div class="toogle">
     	<h3 class="m_3">Observações</h3>
     	<p class="m_text"><?php echo $car['observacoes']; ?></p>
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

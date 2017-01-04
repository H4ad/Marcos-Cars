<?php require_once('../inc/functions.php');
//Parte dos models
$result = (isset($_POST['result']))? $_POST['result'] : '';
$action = (isset($_POST['action']))? $_POST['action'] : null;

if($action == "deleteFoto"){
	if(delete_image($_POST['delid'], $_POST['image'])){
		$result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" style=\"color: white;\">Imagem deletado com sucesso!</a></ul>";
	}
}else if($action == "addImage"){
	if(addImage($_POST['addid'], $_FILES[ 'fileUpload' ][ 'name' ], $_FILES[ 'fileUpload' ][ 'tmp_name' ], $_FILES[ 'fileUpload' ][ 'error' ])){
		$result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" style=\"color: white;\">Sucesso ao cadastrar a imagem!</a></ul>";
	}else{ $result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: red;\"><a class=\"home\" style=\"color: white;\">Falha ao cadastrar a imagem!</a></ul>"; }
}else if($action == "alterDeOb"){
	if(up_car_de_ob($_POST['alterDeObId'],$_POST['detalhes'],$_POST['observacoes'])){
		$result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" style=\"color: white;\">Detalhes e observações atualizadas com sucesso!</a></ul>";
	}else{ $result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: red;\"><a class=\"home\" style=\"color: white;\">Falha ao atualizar detalhes e observações!</a></ul>"; }
}
// fim models

//Parte de alterar informações
$alterid = (isset($_POST['alterid']))? $_POST['alterid'] : null;
$nome = (isset($_POST['nome']))? $_POST['nome'] : null;
$preco = (isset($_POST['preco']))? $_POST['preco'] : null;
$ano = (isset($_POST['ano']))? $_POST['ano'] : null;
$km = (isset($_POST['km']))? $_POST['km'] : null;
$cor = (isset($_POST['cor']))? $_POST['cor'] : null;
$portas = (isset($_POST['portas']))? $_POST['portas'] : null;
$combustivel = (isset($_POST['combustivel']))? $_POST['combustivel'] : null;
$cambio = (isset($_POST['cambio']))? $_POST['cambio'] : null;
$final_placa = (isset($_POST['final_placa']))? $_POST['final_placa'] : null;
$carroceria = (isset($_POST['carroceria']))? $_POST['carroceria'] : null;
if($alterid){
  if(updateCar($alterid, $nome, $preco, $ano, $km, $cor, $portas, $combustivel, $cambio, $final_placa, $carroceria)){
		$result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: green;\"><a class=\"home\" style=\"color: white;\">Informações atualizadas com sucesso!</a></ul>";
	}else{ $result = "<ul class=\"breadcrumb breadcrumb__t\" style=\"background-color: red;\"><a class=\"home\" style=\"color: white;\">Não foi possivel atualizar as informações!</a></ul>"; }
}
//Fim da parte de alterar

//Carregamento das informações da pagina
$allcars = get_car_id_last();
$id = (isset($_GET['id']))? $_GET['id'] : $allcars;
if($id == '' || $id == 1 || $id == 0 || !is_numeric($id)) { $id = $allcars; }
loadCars(5,null,$allcars,"`id` DESC",null,null,$id);
$car = getCar($id);
//Fim do carregamento

$script="
<script src=\"../js/jquery.js\"></script>
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
</script>
<script>
  function getcarstring(id) {
		var local = \"single.php?id=\" + id;
    location.href = local;
  }
	function gotoContact() {
		var local = \"contact.php\";
    location.href = local;
  }
</script>
<!-- FileUpload CSS --><link rel=\"stylesheet\" href=\"../css/bootstrap-fileupload.min.css\" />
<script type=\"text/javascript\">
	jQuery(document).ready(function(){
		jQuery('#ajax_form_delete').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: \"POST\",
				url: \"process_delete.php\",
				data: dados,
				success: function( data )
				{
					alert( data );
					location.href = \"index.php\";
				}
			});

			return false;
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
		<?php echo $result; ?>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
						<?php $imgCar = getPatchFile($car['id']);
						foreach($imgCar as $image){
						?>
							<li>
								<img class="etalage_thumb_image" src="../images/produtos/<?php echo (isset($image['patch_file']))? $image['patch_file'] : 'demoupload.jpg'; ?>" class="img-responsive" />
								<img class="etalage_source_image" src="../images/produtos/<?php echo (isset($image['patch_file']))? $image['patch_file'] : 'demoupload.jpg'; ?>" class="img-responsive" />
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
							<input type="hidden" name="assunto" value="#<?php echo $car['id']; ?> - <?php echo $car['nome']; ?>">
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
			<li onclick="getcarstring(<?php echo $produtos[$i]['id']; ?>)" >
				<img onclick="getcarstring(<?php echo $produtos[$i]['id']; ?>)" src="../images/produtos/<?php echo isset($img['patch_file'])? $img[0]['patch_file'] : 'demoupload.jpg'; ?>" />
				<a onClick="getcarstring(<?php echo $produtos[$i]['id']; ?>)" ><?php echo isset($produtos[$i]['nome'])? $produtos[$i]['nome'] : '-'; ?></a>
			  <p onclick="getcarstring(<?php echo $produtos[$i]['id']; ?>)" >R$ <?php echo isset($produtos[$i]['preco'])? $produtos[$i]['preco'] : '0'; ?></p>
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
     <div class="register_account">
     	 <h3 class="m_3">Detalhes do Carro</h3>
			 <?php if($logado) { ?>
			 <form action="" method="POST">
			 <input type="hidden" name="alterid" value="<?php echo $car['id']; ?>">
			 <?php } ?>
       <table class="table table-striped" cellspacing="0" cellpadding="0">
        <tr>
          <td>Modelo</td>
          <td><?php echo $car['nome']; ?></td>
					<?php if($logado) { ?>
						<td><input name="nome" type="text" value="<?php echo $car['nome']; ?>"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Preço</td>
          <td><?php echo $car['preco']; ?></td>
					<?php if($logado) { ?>
						<td><input name="preco" type="number" value="<?php echo $car['preco']; ?>"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
        <tr>
          <td>Ano</td>
          <td><?php echo $car['ano']; ?></td>
					<?php if($logado) { ?>
						<td><input name="ano" type="text" value="<?php echo $car['ano']; ?>"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
        <tr>
          <td>KM</td>
          <td><?php echo $car['km']; ?></td>
					<?php if($logado) { ?>
						<td><input name="km" type="number" value="<?php echo $car['km']; ?>"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Cor</td>
          <td><?php echo $car['cor']; ?></td>
					<?php if($logado) { ?>
						<td><input name="cor" type="text" value="<?php echo $car['cor']; ?>"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Portas</td>
          <td><?php echo $car['portas']; ?></td>
					<?php if($logado) { ?>
						<td><input name="portas" type="number" value="<?php echo $car['portas']; ?>" size="2"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Combustivel</td>
          <td><?php echo $car['combustivel']; ?></td>
					<?php if($logado) { ?>
						<td>
							<select name="combustivel" class="frm-field required">
									<option value="<?php echo $car['combustivel']; ?>">Selecionar um combustivel:</option>
									<option value="Gasolina">Gasolina</option>
									<option value="Alcool">Alcool</option>
									<option value="Etanol">Etanol</option>
									<option value="Eletrico">Eletrico</option>
						 	</select>
				 		</td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Cambio</td>
          <td><?php echo $car['cambio']; ?></td>
					<?php if($logado) { ?>
						<td>
							<select name="cambio" class="frm-field required">
									<option value="<?php echo $car['cambio']; ?>">Selecionar um cambio:</option>
									<option value="Manual">Manual</option>
									<option value="Automatico">Automatico</option>
									<option value="Automatizado">Automatizado</option>
									<option value="CVT">CVT</option>
							 </select>
						 </td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Final da placa</td>
          <td><?php echo $car['final_placa']; ?></td>
					<?php if($logado) { ?>
						<td>
							<select name="final_placa" class="frm-field required">
								<option value="<?php echo $car['final_placa']; ?>">Final da placa:</option>
								<?php for($i = 0; $i < 10; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
				<tr>
          <td>Carroceria</td>
          <td><?php echo $car['carroceria']; ?></td>
					<?php if($logado) { ?>
						<td><input name="carroceria" type="text" value="<?php echo $car['carroceria']; ?>"></td>
						<td><button class="btn btn-success" type="submit">Enviar Edição</button></td>
					<?php } ?>
        </tr>
      </table>
		<?php if($logado) { ?>
		</form>
		<?php } ?>
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
        <?php if($logado) {
					$footer = "<script src=\"../assets/plugins/jasny/js/bootstrap-fileupload.js\"></script>";
					require_once("modals/singleModals.php");
					require_once("modals/alterInfo.php");
					require_once("modals/addImage.php");
					require_once("modals/deleteCar.php");
					require_once("modals/deleteImage.php");
        }?>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		<?php include(FOOTER_TEMPLATE); ?>

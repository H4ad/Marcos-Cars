<?php require_once('../config.php'); ?>
<?php include(HEADER_TEMPLATE); ?>
          <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Cadastrar</h4>
    		   <form>
    			 <div class="col_1_of_2 span_1_of_2">
		   			 <div><input type="text" value="Modelo" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Modelo';}"></div>
		    			<div><input type="text" value="Situação do veículo" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Situação do veículo';}"></div>
		    			<div><input type="text" value="Portas" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Portas';}"></div>
		    			<div><input type="text" value="quilometragem" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'quilometragem';}"></div>
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">
		    		<div><input type="text" value="Opcionais" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Opcionais';}"></div>
		    		<div><select id="Marca" name="Marca" onchange="change_Marca(this.value)" class="frm-field required">
		            <option value="null">Selecionar Marca</option>
		            <option value="AX">CHEVROLET</option>
		            <option value="AF">FIAT</option>
		            <option value="AL">VOLKSWAGEN</option>
		            <option value="DZ">NISSAN</option>
		            <option value="AS">FORD</option>
		            <option value="AD">JEEP</option>
		            <option value="AO">HONDA</option>
		            <option value="AI">CITROËN</option>
		            <option value="AQ">HYUNDAI</option>
		            <option value="AG">MITSUBISHI</option>
		            <option value="AR">PEUGEOT</option>
		            <option value="AM">RENAULT</option>
		            <option value="AW">SUZUKI</option>
		            <option value="AU">TOYOTA</option>
		            <option value="AT">VOLVO</option>
		            <option value="AZ">CHERY</option>
		         </select></div>
		          <div><input type="text" value="Ano de fabricação" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Ano de fabricação';}"></div>
				  <div><input type="text" value="Versão" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Versão';}"></div>
		          <div><input type="text" value="Placa" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Placa';}"></div>
				   <div>
		          </div>
		          </div>
		      <button class="grey">Cadastrar</button>
		    <div class="clear"></div>
		    </form>
    	</div>
    </div>
    <?php include(FOOTER_TEMPLATE); ?>

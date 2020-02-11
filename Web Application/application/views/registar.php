<?php
defined('BASEPATH') OR exit('URL inválida.');
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registo</title>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/CartaoAllinOneWallet.png'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?php echo base_url('/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css') ?>">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo base_url('/assets/css/css_registo.css') ?>">
	</head>
	<body >
	<div class="modal" id="TermosResponsabilidadeModal">
  	<!-- Modal content -->
	  <div class="modal-content">
				<span style="color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;cursor:pointer;" onclick="spancloseTermosResponsabilidade();">&times;</span>
				<div class="form-header">
					<h3>Termos de Responsabilidade</h3>
				</div>
				<div class="form-row">
					

				</div>
				<div class="form-row">
				
				</div>
				<div class="form-row">
					
				</div>
				<div class="form-row" style="margin-bottom:0px">
					
				</div>
			</div>
</div>
		<div id="AreasInteresseModal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<div class="form-header">
					<h3>Áreas de Interesse</h3>
				</div>
				<div class="form-row">
					<label>Áreas de Interesse Disponíveis</label>
						<select style="width: 100%; max-height: 300%; overflow: auto;cursor:pointer;" onchange="AreasInteresseSelected(this.options[this.selectedIndex])" name="user_areainteresse" id="user_areainteresse">
							<option value="0">Agricultura</option>
							<option value="1">Arquitetura</option>
							<option value="2">Comunicações</option>
							<option value="3">Desporto</option>
							<option value="4">Gastronomia</option>
							<option value="5">Hotelaria</option>
							<option value="6">Informática</option>
							<option value="7">Lazer</option>
							<option value="8">Logística</option>
							<option value="9">Negócios Imobiliários</option>
							<option value="10">Saúde</option>
							<option value="11">Tecnologia</option>
							<option value="12">Transportes</option>
							<option value="13">Turismo</option>
							<option value="14">Vestuário</option>
						</select>

				</div>
				<div class="form-row">
					<div id="alertAreaInteresseSelecionada" onclick="this.style.display='none';document.getElementById('user_areainteresse').disabled=false">
						<center><span>Área de Interesse já selecionada</span></center>
					</div>
				</div>
				<div class="form-row">
					<label>Áreas de Interesse Selecionadas</label>
					<div class="form-control" id="AreasInteresseSelecionadas" style="min-height:37px">
						
					</div>
				</div>
				<div class="form-row" style="margin-bottom:0px">
					<button onclick="GuardarAreasInteressebtn()" class="GuardarAreasInteresseBtn">Guardar</button>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<form action="<?php echo site_url('Ctr_geral/ValidarRegisto') ?>" method="post" id="wizard" enctype="multipart/form-data" >
				<!-- SECTION 1 - Informação Pessoal do Utilizador -->
				<h2></h2>
				<section  style="display:none">
					<div class="inner">
						<div class="image-holder">
							<img src="<?php echo base_url('assets/images/Registo1.png'); ?>" alt="">
						</div>
						<div class="form-content" >
							<div class="form-header">
								<h3>Faça já o seu Registo</h3>
							</div>
							<div class="form-row">
								<div class="form-holder">
									<input  type="text" placeholder="Primeiro Nome" class="form-control" name="text_PNome" id="text_PNome" value="<?php echo set_value('text_PNome');?>" >
									<?php echo form_error('text_PNome', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
								</div>
								<div class="form-holder">
									<input  type="text" placeholder="Ultimo Nome" class="form-control" name="text_UNome"id="text_UNome" value="<?php echo set_value('text_UNome');?>">
									<?php echo form_error('text_UNome', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
									<input  type="number" placeholder="Telemovel" class="form-control" name="text_tele" id="text_tele" value="<?php echo set_value('text_tele');?>">
									<?php echo form_error('text_tele', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
								<div class="form-holder">
									<input  type="number" placeholder="NIF" class="form-control" name="text_nif" id="text_nif" value="<?php echo set_value('text_nif');?>">
									<?php echo form_error('text_nif', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
									<input  type="email" placeholder="Email" class="form-control" name="text_email" id="text_email"  value="<?php echo set_value('text_email');?>">
									<?php echo form_error('text_email', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
								<div class="form-holder">
									<input  type="Date" placeholder="Data Nascimento" class="form-control" name="text_datanasc" id="text_datanasc" value="<?php echo set_value('text_datanasc');?>">
									<?php echo form_error('text_datanasc', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
									<input  type="Password" placeholder="Password" class="form-control" id="text_password" name="text_password" onchange="check();" value="<?php echo set_value('text_password');?>">
									<?php echo form_error('text_password', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
								<div class="form-holder">
									<input  type="Password" placeholder="Confirme a Password" class="form-control" id="text_confpassword" name="text_confpassword" onkeyup="check();" value="<?php echo set_value('text_confpassword');?>">
									<span id='message'></span>
									<?php echo form_error('text_confpassword', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
								</div>

							</div>
							<div class="form-row">
								<div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
									<div class="checkbox-tick">
										<label>
											<input type="radio" name="genero" value="0" <?php if(set_value('genero') == '0') echo "checked='checked'"; ?>> Masculino<br>
											<span class="checkmark"></span>
										</label>
										<label>
											<input type="radio" name="genero" value="1" <?php if(set_value('genero') == '1') echo "checked='checked'"; ?>> Feminino<br>
											<span class="checkmark"></span>
										</label>
										<label>
											<input type="radio" name="genero" value="2" <?php if(set_value('genero') == '2') echo "checked='checked'"; ?>> Outro<br>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								

							</div>
							<?php echo form_error('genero', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
							<div class="checkbox-circle">
								<label>
									<input  type="checkbox" name="Termos_Responsabilidade" <?php if(set_value('Termos_Responsabilidade')) echo "checked='checked'"; ?>> Aceito Todos Os <a id="termosresponsabilidadebtn" name="termosresposabilidadebtn" onclick="OpenTermosResponsabilidadeModal()" >Termos De Responsabilidade</a>
									<span class="checkmark" ></span>
								</label>
							</div>
							<?php echo form_error('Termos_Responsabilidade', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

						</div>
					</div>
				</section>
				<!-- SECTION 2 - Informação do Estabelecimento -->
				<h2></h2>
				<section style="display:none">
					<div class="inner">
						<div class="image-holder">
							<img src="<?php echo base_url('assets/images/Registo2.png'); ?>" alt="" style="width:100%">
						</div>
						<div class="form-content" >
							<div class="form-header">
								<h3>Registe o seu Estabelecimento</h3>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									<input  type="text" placeholder="Nome" class="form-control" name="text_nomeEstabelecimento" id="text_nomeEstabelecimento" value="<?php echo set_value('text_nomeEstabelecimento');?>">
									<?php echo form_error('text_nomeEstabelecimento', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									<input  type="text" placeholder="Morada" class="form-control" name="text_morada" id="text_morada" value="<?php echo set_value('text_morada');?>">
									<?php echo form_error('text_morada', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row">
								<div class="form-holder">
									<input  type="text" placeholder="Codigo Postal" class="form-control" name="text_codpostal" id="text_codpostal" value="<?php echo set_value('text_codpostal');?>">
									<?php echo form_error('text_codpostal', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
									
								</div>
								
								<div class="form-holder" style="width:100%">		
									<div class="select">
										<div class="form-holder">
											<select  class="form-control" style="max-width: 160%; max-height: 700%; overflow: auto;cursor:pointer" name="text_cidade" id="text_cidade" value="<?php echo set_value('text_cidade');?>">
											<option selected disabled>Selecione a Cidade</option>
											<option value="Abrantes">Abrantes</option>
											<option value="Agualva-Cacém">Agualva-Cacém</option>
											<option value="Águeda">Águeda</option>
											<option value="Albufeira">Albufeira</option>
											<option value="Alcácer do Sal">Alcácer do Sal</option>
											<option value="Alcobaça">Alcobaça</option>
											<option value="Alfena">Alfena</option>
											<option value="Almada">Almada</option>
											<option value="Almeirim">Almeirim</option>
											<option value="Amadora">Amadora</option>
											<option value="Amarante">Amarante</option>
											<option value="Amora">Amora</option>
											<option value="Anadia">Anadia</option>
											<option value="Angra do Heroísmo">Angra do Heroísmo</option>
											<option value="Águeda">Águeda</option>
											<option value="Abrantes">Abrantes</option>
											<option value="Aveiro">Aveiro</option>
											<option value="Barcelos">Barcelos</option>
											<option value="Barreiro">Barreiro</option>
											<option value="Beja">Beja</option>
											<option value="Braga">Braga</option>
											<option value="Bragança">Bragança</option>
											<option value="Caldas da Rainha">Caldas da Rainha</option>
											<option value="Câmara de Lobos">Câmara de Lobos</option>
											<option value="Caniço">Caniço</option>
											<option value="Cantanhede">Cantanhede</option>
											<option value="Cartaxo">Cartaxo</option>
											<option value="Castelo Branco">Castelo Branco</option>
											<option value="Chaves">Chaves</option>
											<option value="Coimbra">Coimbra</option>
											<option value="Costa da Caparica">Costa da Caparica</option>
											<option value="Covilhã">Covilhã</option>
											<option value="Elvas">Elvas</option>
											<option value="Entroncamento">Entroncamento</option>
											<option value="Ermesinde">Ermesinde</option>
											<option value="Esmoriz">Esmoriz</option>
											<option value="Espinho">Espinho</option>
											<option value="Esposende">Esposende</option>
											<option value="Estarreja">Estarreja</option>
											<option value="Estremoz">Estremoz</option>
											<option value="Évora">Évora</option>
											<option value="Fafe">Fafe</option>
											<option value="Faro">Faro</option>
											<option value="Fátima">Fátima</option>
											<option value="Felgueiras">Felgueiras</option>
											<option value="Figueira da Foz">Figueira da Foz</option>
											<option value="Fiães">Fiães</option>
											<option value="Freamunde">Freamunde</option>
											<option value="Funchal">Funchal</option>
											<option value="Fundão">Fundão</option>
											<option value="Gafanha da Nazaré">Gafanha da Nazaré</option>
											<option value="Gandra">Gandra</option>
											<option value="Gondomar">Gondomar</option>
											<option value="Gouveia">Gouveia</option>
											<option value="Guarda">Guarda</option>
											<option value="Guimarães">Guimarães</option>
											<option value="Horta">Horta</option>
											<option value="Ílhavo">Ílhavo</option>
											<option value="Lagoa">Lagoa</option>
											<option value="Lagos">Lagos</option>
											<option value="Lamego">Lamego</option>
											<option value="Leiria">Leiria</option>
											<option value="Lisboa">Lisboa</option>
											<option value="lixa">optionxa</option>
											<option value="Loulé">Loulé</option>
											<option value="Loures">Loures</option>
											<option value="Lourosa">Lourosa</option>
											<option value="Machico">Machico</option>
											<option value="Maia">Maia</option>
											<option value="Mangualde">Mangualde</option>
											<option value="Marco de Canaveses">Marco de Canaveses</option>
											<option value="Marinha Grande">Marinha Grande</option>
											<option value="Matosinhos">Matosinhos</option>
											<option value="Mealhada">Mealhada</option>
											<option value="Elvas">Elvas</option>
											<option value="Miranda do Douro">Miranda do Douro</option>
											<option value="Mirandela">Mirandela</option>
											<option value="Montemor-o-Novo">Montemor-o-Novo</option>
											<option value="Montijo">Montijo</option>
											<option value="Moura">Moura</option>
											<option value="Odivelas">Odivelas</option>
											<option value="Olhão da Restauração">Olhão da Restauração</option>
											<option value="Oliveira de Azeméis">Oliveira de Azeméis</option>
											<option value="Oliveira do Bairro">Oliveira do Bairro</option>
											<option value="Oliveira do Hospital">Oliveira do Hospital</option>
											<option value="Ourém">Ourém</option>
											<option value="Ovar do Sal">Ovar</option>
											<option value="Paços de Ferreira">Paços de Ferreira</option>
											<option value="Paredes">Paredes</option>
											<option value="Penafiel">Penafiel</option>
											<option value="Peniche">Peniche</option>
											<option value="Peso da Régua">Peso da Régua</option>
											<option value="Pinhel">Pinhel</option>
											<option value="Ponta Delgada">Ponta Delgada</option>
											<option value="Ponte de Sor">Ponte de Sor</option>
											<option value="Portalegre">Portalegre</option>
											<option value="Porto Santo">Porto Santo</option>
											<option value="Póvoa de Santa Iria">Póvoa de Santa Iria</option>
											<option value="Póvoa de Varzim">Póvoa de Varzim</option>
											<option value="Praia da Vitória">Praia da Vitória</option>
											<option value="Quarteira">Quarteira</option>
											<option value="Queluz">Queluz</option>
											<option value="Reguengos de Monsaraz">Reguengos de Monsaraz</option>
											<option value="Ribeira Grande">Ribeira Grande</option>
											<option value="Rio Maior">Rio Maior</option>
											<option value="Rio Tinto">Rio Tinto</option>
											<option value="Sabugal">Sabugal</option>
											<option value="Sacavém">Sacavém</option>
											<option value="Santa Comba Dão">Santa Comba Dão</option>
											<option value="Cartaxo">Cartaxo</option>
											<option value="Santa Cruz">Santa Cruz</option>
											<option value="Santa Maria da Feira">Santa Maria da Feira</option>
											<option value="Santana">Santana</option>
											<option value="Santarém">Santarém</option>
											<option value="Santiago do Cacém">Santiago do Cacém</option>
											<option value="Santo Tirso">Santo Tirso</option>
											<option value="São João da Madeira">São João da Madeira</option>
											<option value="São Mamede de Infesta">São Mamede de Infesta</option>
											<option value="São Salvador de Lordelo">São Salvador de Lordelo</option>
											<option value="Seia">Seia</option>
											<option value="Seixal">Seixal</option>
											<option value="Serpa">Serpa</option>
											<option value="Setúbal">Setúbal</option>
											<option value="Silves">Silves</option>
											<option value="Tarouca">Tarouca</option>
											<option value="Tavira">Tavira</option>
											<option value="Tomar">Tomar</option>
											<option value="Tondela">Tondela</option>
											<option value="Torres Novas">Torres Novas</option>
											<option value="Torres Vedras">Torres Vedras</option>
											<option value="Trancoso">Trancoso</option>
											<option value="Vale de Cambra">Vale de Cambra</option>
											<option value="Valpaços">Valpaços</option>
											<option value="Vendas Novas">Vendas Novas</option>
											<option value="Viana do Castelo">Viana do Castelo</option>
											<option value="Vila do Conde">Vila do Conde</option>
											<option value="Vila Franca de Xira">Vila Franca de Xira</option>
											<option value="Vila Nova de Famalicão">Vila Nova de Famalicão</option>
											<option value="Vila Nova de Foz Côa">Vila Nova de Foz Côa</option>
											<option value="Vila Nova de Gaia">Vila Nova de Gaia</option>
											<option value="Vila Nova de Santo André">Vila Nova de Santo André</option>
											<option value="Vila Real">Vila Real</option>
											<option value="Lagos">Lagos</option>
											<option value="Vila Real de Santo António">Vila Real de Santo António</option>
											<option value="Viseu">Viseu</option>
											<option value="Vizela">Vizela</option>
											</select>
											<?php echo form_error('text_cidade', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
									    </div>	
									

									</div>
								</div>
								
							</div>
							
							<div class="form-row" >
								<input  type="text" style="cursor:pointer" class="form-control" placeholder="Areas de Interesse" id="areainteressebtn" name="areainteressebtn" onclick="OpenAreasInteresseModal()"  onchange="func_Areainteresse();" value="<?php echo set_value('areainteressebtn');?>">
								

							</div>
							<?php echo form_error('areainteressebtn', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
							<div class="form-row" style="margin-bottom:1%">
								<textarea  class="form-control" placeholder="Descrição" style="height: 99px;" rows="3" name="text_descricao" id="text_descricao" ><?php echo set_value('text_descricao');?></textarea>
								

							</div>
							<?php echo form_error('text_descricao', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
						</div>
					</div>
				</section>
				<!-- SECTION 3 -->
				<h2></h2>
				<section style="display:none">
					<div class="inner" >
						<div class="image-holder">
							<img src="<?php echo base_url('assets/images/Registo3.png'); ?>" alt="" style="width:100%">
						</div>
						<div class="form-content">
							<div class="form-header">
								<h3>Documentos Necessários</h3>
							</div>
							<div class="form-row">
								<div class="form-holder w-100">
									<a>Para poder inscrever-se nos nossos serviços é necessário um comprovativo de empresa,</tspan><tspan x="-375.872" y="22">de forma a podermos verificar a veracidade da informação dada:</a>
								</div>
							</div>
							<div class="form-row">
								<div class="upload-btn-wrapper btn" >
									Upload Documento 1
									<input type="file" name="upload_doc1" id="upload_doc1"  onchange="doc1check();" value="<?php echo set_value('upload_doc1');?>">
									<?php echo form_error('upload_doc1', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
									<?php if(isset($errorComprovativo)) foreach($errorComprovativo as $row) echo $row;?>
									</div>
									<img src="<?php echo base_url('assets/images/checked.png'); ?>" alt="Carregado" class="doccheck hide" id="check1">
								
							</div>
							
						</div>
					</div>
				</section>
				<!-- SECTION 4 -->
				<h2></h2>
				<section style="display:none">
					<div class="inner" >
						<div class="image-holder">
							<img src="<?php echo base_url('assets/images/Registo4.png'); ?>" alt="" style="width:100%">
						</div>
						<div class="form-content">
							<div class="form-header">
								<h3>Adicione o seu Cartão</h3>
							</div>
							<div class="pontos">
							<div class="form-row pontos">
								<div style="margin-right:3%" >
									<p style="margin-top:3%">Ganhar Pontos:</p>
								</div>
								<div >
									<a><input  type="number" placeholder="1" min="0.1" step="0.1"  style="width: 50px;" class="form-control" name="text_Gpontos" id="text_Gpontos" value="<?php echo set_value('text_Gpontos');?>">€ de compras equivale 1 Ponto</a>
									<?php echo form_error('text_Gpontos', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row" style="margin-bottom:0px">
								<div style="margin-right:3%">
									<p style="margin-top:3%">Usar Pontos:</p>
								</div>
								<div >
									<a>1 Ponto equivale a <input  type="number" min="0.1" step="0.1" class="form-control" placeholder="1" min="0.1" style="width: 40px;" name="text_Upontos" id="text_Upontos" value="<?php echo set_value('text_Upontos');?>">€ de compras</a>
									<?php echo form_error('text_Upontos', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

								</div>
							</div>
							<div class="form-row" style="margin-bottom:12%">
								<div class="add_cartao">
									<div class="cartao_pontos">
									<img id="img_cartao" class="img_cartao" src="<?php echo base_url('assets/images/logo-placeholder.png'); ?>" alt="Carregue o seu logótipo" /></div>
									<div class="upload-btn-wrapper btn">
										Carregue o seu Logótipo
										<input type='file' onchange="readURL(this);validator();" id="Logotipo" name="Logotipo" value="<?php echo set_value('Logotipo');?>">
										<?php echo form_error('Logotipo', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
										<?php if(isset($errorLogotipo)) foreach($errorLogotipo as $row) echo $row;?>

									</div>
								</div>
							</div>
						</div>
							<div class="ConcluidoRegisto">
								<input type="submit" value="Concluir Registo&nbsp;&nbsp;&#10004;" class="btn_concluir" id="concluir" >
							</div>
							
						</div>
						
					</section>
				</form>
			</div>
		<!-- JQUERY -->
		<script src="<?php echo base_url('/assets/js/jquery-3.3.1.min.js') ?>"></script>

		<!-- JQUERY STEP -->
		<script src="<?php echo base_url('/assets/js/jquery.steps.js') ?>"></script>
		<script src="<?php echo base_url('/assets/js/main.js') ?>"></script>
		</body>
	</html>
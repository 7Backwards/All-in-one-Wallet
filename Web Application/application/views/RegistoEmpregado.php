<?php
defined('BASEPATH') OR exit('URL inválida.');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Completar Registo</title>
        <!--stylesheets-->
        <link rel="stylesheet" href="<?php echo base_url('assets/bundles/css/style.css'); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/bundles/images/icons/favicon.ico'); ?>"/>
        <!--===============================================================================================-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body> 
        <div id="page" class="row" style="height:100%">
            <img src="<?php echo base_url('assets/images/logo.svg'); ?>" class="logobiz">
            <div class="col-lg-6 my-auto">
                    <img src="<?php echo base_url('assets/images/LogInPhoto.png'); ?>" alt="" style="width:100%">
                </div>
            
            <div class="col-lg-6 my-auto ">
            <form class="login100-form validate-form mx-auto" method="post" action="<?php echo site_url(); ?>/ConfirmRegistoEmpregado_C/AdicionarEmpregado/<?php echo $this->uri->segment(3);?>">
                    <span class="login100-form-title">
                        Complete o seu registo
                    </span>

                    <div class="row">
                        <div class="col-md-12">
                            <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Tipo:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="tipo" readonly value=" <?php echo $valor->TIPO_EMPREGADO; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Nome:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="nome" readonly value=" <?php echo $valor->NOME_EMPREGADO; ?>">  
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Email:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="email" readonly value=" <?php echo $valor->EMAIL_EMPREGADO; ?>"> 
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Password:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" id="password" name="password" minlength=6  required >   
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block; ">Confirmar password:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" id="confirm_password" name="confirm_password" minlength=6 required>    
								<span id='message'></span>   
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Data Nascimento:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="date" name="data_nascimento"required>   
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Sexo:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="wrap-input100 validate-input">
                            <select class="input100" style="max-width: 160%; max-height: 700%; overflow: auto;cursor:pointer" name="sexo"required>
					            <option selected disabled>Selecione o seu sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro</option>
                            </select>     
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Cidade:</span>
                        </div>
                        <div class="col-md-12" style="margin-left:20px;">
                            <div class="">
                            <select class="input100" style="max-width: 160%; max-height: 700%; overflow: auto;cursor:pointer" name="cidade" required>
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
											<option value="optionsboa">optionsboa</option>
											<option value="optionxa">optionxa</option>
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
											<option value="Ooptionveira de Azeméis">Ooptionveira de Azeméis</option>
											<option value="Ooptionveira do Bairro">Ooptionveira do Bairro</option>
											<option value="Ooptionveira do Hospital">Ooptionveira do Hospital</option>
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
											<option value="Vila Nova de Famaoptioncão">Vila Nova de Famaoptioncão</option>
											<option value="Vila Nova de Foz Côa">Vila Nova de Foz Côa</option>
											<option value="Vila Nova de Gaia">Vila Nova de Gaia</option>
											<option value="Vila Nova de Santo André">Vila Nova de Santo André</option>
											<option value="Vila Real">Vila Real</option>
											<option value="Lagos">Lagos</option>
											<option value="Vila Real de Santo António">Vila Real de Santo António</option>
											<option value="Viseu">Viseu</option>
											<option value="Vizela">Vizela</option>
											</select>    
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-12" style="margin-left:20px; margin-top:25px;">
                            <div class="wrap-input100 validate-input">
                            <input class="login100-form-btn" type="submit" value="Completar Registo!" >    
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
 
                </form>
              
            </div>
        </div>
        <script>
				$('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Palavra-passe Coincice').css('color', 'green');
		} else 
			$('#message').html('Palavra-passe não Coincice').css('color', 'red');
		});
		</script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
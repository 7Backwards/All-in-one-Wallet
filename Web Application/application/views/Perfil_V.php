 <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="black" data-active-color="primary">
        <div class="logo">
          <a class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="<?php echo base_url('assets/img/logo-small.png'); ?>">
            </div>
          </a>
          <div class="simple-text logo-normal font-weight-light ">
            <?php echo $this->session->userdata('comerciante_nome'); ?>
          </div>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="<?php echo base_url('index.php/Estatisticas_C'); ?>">
                <i class="fa fa-bar-chart"></i>
                <p>Estatísticas</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('index.php/Clientes_C'); ?>">
                <i class="fas fa-user-friends"></i>
                <p>Clientes</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('index.php/Campanhas_C/Mostrar'); ?>">
                <i class="fas fa-bullhorn"></i>
                <p>Campanhas</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('index.php/CartaoFidelizacao_C'); ?>">
                <i class="far fa-credit-card"></i>
                <p>Cartão de Fideliza&ccedil;&atilde;o</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('index.php/Transacoes_C'); ?>">
                <i class="fas fa-exchange-alt"></i>
                <p>Transa&ccedil;&otilde;es</p>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('Empregados_C'); ?>">
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>Empregados</p>
              </a>
            </li>
          <li>
            <li class="active">
              <a href="<?php echo base_url('index.php/Perfil_C'); ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>Perfil</p>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('index.php/Email_C'); ?>">
                <i class="fa fa-envelope"></i>
                <p>Email</p>
              </a>
            </li>
             <li id="logout">
              <a href="<?php echo site_url('Logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
       <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="#pablo">All-in-one Wallet</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            
          </div>
        </nav>
        <div class="content">
          <div class="row">
            <div class="col-md-4">
              <div class="card card-user" >
                <div class="image">
                  <img src="<?php echo base_url('assets/img/damir-bosnjak.jpg'); ?>" alt="...">
                </div>
                <div class="card-body">
                  <div class="author">
                    <a href="#">
                      <img class="avatar" src="<?php echo base_url('assets/img/logo-small.png'); ?>" alt="...">
                      <h5 class="text-dark"><?php echo $this->session->userdata('comerciante_nome'); ?></h5>
                    </a>
                    <p class="description">
                      <div class="col-lg-12 col-md-12 col-12" style="margin-top:20px">
                        <button class="btn btn-outline-success" style="font-size:10px" data-toggle="modal" data-target="#PlanoModal">Gerir Planos</button>
                        <?php if(isset($msg))echo '<div>'.$msg.'</div>'; ?>
                      <div class="modal fade show" id="PlanoModal">
                        <div class="modal-dialog modal-lg ">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header  ">
                              
                              <h4 class="modal-title justify-content-center mx-auto">Escolha o seu Plano</h4>
                              <button type="button" class="close" data-dismiss="modal" style="margin:0;padding:0">&times;</button>
                              
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="row justify-content-center">
                             
                              <div class="col-lg-5" style="margin-top:5%">
                               <div class="border border-primary text-center" style="border-radius: 18px" >
                                <h6 class="text-success font-weight-bold" style="font-size:1.5em;margin-top:5%"> Premium </h6>
                                 <h5 class="text-dark" style="font-size:0.8em;margin-top:10%;margin-bottom:10%"><span style="font-size:3em">14.99€</span> / month</h5>
                                 <hr>
                                 <h5 style="font-size:0.8em">
                                   Suporte 24 Horas</h5>
                                   <h5 style="font-size:0.8em">Campanhas Ilimitadas</h5>
                                    <h5 style="font-size:0.8em">Notificações Ilimitadas</h5>
                                    <h5 style="font-size:0.8em">Acesso a estatísticas</h5>
                                    <h5 style="font-size:0.8em">Destaque do seu negócio</h5>

                                 
                <!--  <button class="btn btn-block btn-success" style="margin: 0;border-radius: 0px 0px 18px 18px;">Adquirir Plano</button>-->
                  <a href="<?php echo site_url("Perfil_C/comprarPremium");?>" class="btn btn-block btn-success" style="margin: 0;border-radius: 0px 0px 18px 18px;">Adquirir Plano</a>
                               </div>
                              </div>
                              <div class="col-lg-5" style="margin-top:5%">
                                <div class="border border-primary text-center" style="border-radius: 18px" >
                                <h6 class="text-danger font-weight-bold" style="font-size:1.5em;margin-top:5%"> Pro </h6>
                                 <h5 class="text-dark" style="font-size:0.8em;margin-top:10%;margin-bottom:10%"><span style="font-size:3em">9.99€</span> / month</h5>
                                 <hr>
                                 <h5 style="font-size:0.8em">
                                   Suporte 24 Horas</h5>
                                   <h5 style="font-size:0.8em">Campanhas Ilimitadas</h5>
 <h5 style="font-size:0.8em">Notificações Ilimitadas</h5>
<h5 style="font-size:0.8em">Acesso a estatísticas</h5>
<h5 style="font-size:0.8em">Destaque do seu negócio</h5>

<a href="<?php echo site_url("Perfil_C/comprarPro/");?>" class="btn btn-block btn-danger" style="margin: 0;border-radius: 0px 0px 18px 18px;">Adquirir Plano</a>
<!--<button class="btn btn-block btn-danger" style="margin: 0;border-radius: 0px 0px 18px 18px;">Adquirir Plano</button> -->
                               </div>
                              </div>
                         

                              </div>
                            </div>
                            <div class="modal-footer ml-auto mr-auto">
                           </div>
                           
                          </div>
                        </div>
                      </div>
                      </div>
                    </p>
                  </div>
                </div>
                <div class="card-footer">
                  <hr>
                  <div class="button-container">
                    <div class="row">
                      <div class="col-lg-5 col-md-5  col-6 ">
                        <h5>Plano
                        <br>
                        <small>
                        <?php
                        if($nomeplano==null || $diasfalta==null)
                        {
                          echo "----------";
                        }
                        else
                        {
                          echo $nomeplano[0]->NOME_PLANO;
                        }
                       
                        ?>
                        </small>
                        </h5>
                      </div>
                      <div class="col-lg-7 col-md-7 col-6 ">
                        <h5>Data Expiracao
                        <br>
                        <small>
                        <?php 
                          if($diasfalta==null)
                          {
                            echo "----------";
                          }
                          else
                          {
                            echo $diasfalta[0]->DATA_EXPIRACAO_PLANO;         
                          }
                     
                             
                        ?>
                        </small>
                        </h5>
                      </div>
                      
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Defini&ccedil;&otilde;es Conta</h5>
                </div>
                <div class="card-body">
                  <form action="<?php echo site_url('Perfil_C/update') ?>" method="post" >
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" disabled="" name="comerciante_nome" value="<?php echo $this->session->userdata('comerciante_nome'); ?>">
                          <?php echo form_error('comerciante_nome', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Estabelecimento *</label>
                          <input type="text" class="form-control" name="estabelecimento_nome" value="<?php echo $this->session->userdata('estabelecimento_nome'); ?>">
                          <?php echo form_error('estabelecimento_nome', '<div style="color:red;font-size:0.9em">', '</div>'); ?>      
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="Password" class="form-control"  name="comerciante_password" value="examplePassword">
                          <?php echo form_error('comerciante_password', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sistema Promocional</label>
                          <input type="text" class="form-control" disabled=""  value="Pontos">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="comerciante_email"
                          value="<?php echo $this->session->userdata('comerciante_email'); ?>">
                          <?php echo form_error('comerciante_email', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                        </div>
                      </div>
                    </div>
                    <hr size="15px">
                    <h5 class="card-title">Dados Pessoais</h5>
                    <br>
                    <div class="row">
                      <div class="col-md-12 ">
                        <div class="form-group">
                          <label>Data de Nascimento</label>
                          <input  class="form-control" name="comerciante_datanasc" value="<?php echo $this->session->userdata('comerciante_datanasc'); ?>" disabled="">
                          <?php echo form_error('comerciante_datanasc', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Telemóvel</label>
                          <input  class="form-control" name="comerciante_telemovel" value="<?php echo $this->session->userdata('comerciante_telemovel'); ?>">
                          <?php echo form_error('comerciante_telemovel', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sexo</label>
                          <select disabled name="comerciante_sexo" value="<?php if(($this->session->userdata('comerciante_sexo')) == 0) echo "Masculino"; if(($this->session->userdata('comerciante_sexo')) == 1) echo "Feminino"; if(($this->session->userdata('comerciante_sexo')) == 2) echo "Outro"; ?>" class="form-control">
                            <option >Masculino</option>
                            <option >Feminino</option>
                            <option> Outro</option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <hr size="15px">
                    <h5 class="card-title">Dados Estabelecimento</h5>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Morada *</label>
                          <input  class="form-control" name="estabelecimento_morada" value="<?php echo $this->session->userdata('estabelecimento_morada'); ?>">
                          <?php echo form_error('estabelecimento_morada', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Cidade *</label>
                          <select name="estabelecimento_cidade"  class="form-control">
                          <option  selected><?php echo $this->session->userdata('estabelecimento_cidade'); ?> </option>
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
                          <?php echo form_error('estabelecimento_cidade', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Código Postal *</label>
                          <input class="form-control" type="text" name="estabelecimento_codigopostal" value="<?php echo $this->session->userdata('estabelecimento_codigopostal'); ?>">
                          <?php echo form_error('estabelecimento_codigopostal', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Áreas de Interesse</label><i style="margin-left:0.5%;cursor:pointer" class="fa fa-pencil-square-o text-primary" aria-hidden="true" data-toggle="modal" data-target="#AreasInteresseModal"></i>
                          <input type="text" readonly style="cursor:pointer" class="form-control"  id="areainteressebtn" name="areainteressebtn" value="<?php echo $this->session->userdata('estabelecimento_areasinteresse')?>" >
                        </div>
                      </div>
                      <div class="modal fade show" id="AreasInteresseModal">
                        <div class="modal-dialog modal-lg ">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Editar Áreas de Interesse</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Áreas de Interesse</label>
                                    <select id="user_areainteresse" class="form-control" onchange="AreasInteresseSelected(this.options[this.selectedIndex])" style="height:100%">
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
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div id="alertAreaInteresseSelecionada" onclick="this.style.display='none';document.getElementById('user_areainteresse').disabled=false">
                                    <center><span>Área de Interesse já selecionada</span></center>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Áreas de Interesse Selecionadas</label>
                                    <div class="form-control" id="AreasInteresseSelecionadas" style="min-height:37px">
                                    <?php if(ISSET($AreasInteresse)) {
                                      $i=0;
                                         while(ISSET($AreasInteresse[$i])) {
                                           echo "<div class='d-inline' >".$AreasInteresse[$i]." "."<i onclick='RemoverAreaInteresseSelected(this)'  class='fas fa-times' style='color:red;margin-left:0.5%;margin-right:0.5%;cursor:pointer'></i></div>";
                                           $i++;
                                         }
                                    }?>
        
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer ml-auto mr-auto">
                              <button type="button" class="btn btn-danger" onclick="GuardarAreasInteressebtn()" class="GuardarAreasInteresseBtn" >Guardar Alterações</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Descrição</label>
                          <input class="form-control" type="text" name="estabelecimento_descricao" value="<?php echo $this->session->userdata('estabelecimento_descricao'); ?>">
                          <?php echo form_error('estabelecimento_descricao', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        *Alteração deste campo resultará no envio de uma notificação aos clientes fidelizados de forma a dar conhecimento da mesma.
                      </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
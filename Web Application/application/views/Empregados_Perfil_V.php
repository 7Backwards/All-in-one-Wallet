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
            <?php echo $this->session->userdata('empregado_nome'); ?>
          </div>
        </div>
        <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('index.php/Empregados_Campanhas_C/Mostrar'); ?>">
              <i class="fas fa-bullhorn"></i>
              <p>Campanhas</p>
            </a>
          </li>
          <li >
            <a href="<?php echo base_url('index.php/Empregados_Transacoes_C'); ?>">
              <i class="fas fa-exchange-alt"></i>
              <p>Transa&ccedil;&otilde;es</p>
            </a>
          </li>
          
          <li class="active">
            <a href="<?php echo base_url('index.php/Empregados_Perfil_C'); ?>">
              <i class="nc-icon nc-single-02"></i>
              <p>Perfil</p>
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
                    
                      <img class="avatar" src="<?php echo base_url('assets/img/logo-small.png'); ?>" alt="...">
                      <h5 class="text-dark"><?php echo $this->session->userdata('empregado_nome'); ?></h5>
                    
                    <p class="description">
                      <div class="col-lg-12 col-md-12 col-12" style="margin-top:20px">
                       
    
                      </div>
                    </p>
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
                  <form action="<?php echo site_url('Empregados_Perfil_C/update') ?>" method="post" >
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" disabled="" name="empregado_nome" value="<?php echo $this->session->userdata('empregado_nome'); ?>">
                        
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Estabelecimento </label>
                          <input readonly type="text" class="form-control" name="estabelecimento_nome" value="<?php echo $this->session->userdata('estabelecimento_nome'); ?>">
                         
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="Password" class="form-control"  name="empregado_password" value="examplePassword">
                          <?php echo form_error('empregado_password', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

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
                          <input type="text" class="form-control" name="empregado_email"
                          value="<?php echo $this->session->userdata('empregado_email'); ?>">
                          <?php echo form_error('empregado_email', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

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
                          <input  class="form-control" name="empregado_datanasc" value="<?php echo $this->session->userdata('empregado_datanasc'); ?>" disabled="">
                        

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Sexo</label>
                          <select disabled name="empregado_sexo" value="<?php if(($this->session->userdata('empregado_sexo')) == 0) echo "Masculino"; if(($this->session->userdata('empregado_sexo')) == 1) echo "Feminino"; if(($this->session->userdata('empregado_sexo')) == 2) echo "Outro"; ?>" class="form-control">
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
                          <label>Morada </label>
                          <input  readonly class="form-control" name="estabelecimento_morada" value="<?php echo $this->session->userdata('estabelecimento_morada'); ?>">
                        

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Cidade </label>
                          <select readonly name="estabelecimento_cidade"  class="form-control">
                          <option   selected><?php echo $this->session->userdata('estabelecimento_cidade'); ?> </option>
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Código Postal </label>
                          <input readonly class="form-control" type="text" name="estabelecimento_codigopostal" value="<?php echo $this->session->userdata('estabelecimento_codigopostal'); ?>">
                          

                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Áreas de Interesse</label>
                          <input type="text" readonly style="cursor:pointer" class="form-control"  id="areainteressebtn" name="areainteressebtn" value="<?php echo $this->session->userdata('estabelecimento_areasinteresse')?>" >
                        </div>
                      </div>
        
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Descrição</label>
                          <input readonly class="form-control" type="text" name="estabelecimento_descricao" value="<?php echo $this->session->userdata('estabelecimento_descricao'); ?>">
                        
                        </div>
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
 
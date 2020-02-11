
  
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
        
        <div class="content ">
          <div class="row">
            <div class="col-lg-6" >
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="card-title" style="margin-left:2%">
                      <h6 style="font-size:1.5em">Criar Campanha</h6>
                    </div>
                    
                  </div>
                  <form action="<?php echo site_url('Campanhas_C/AdicionarCampanha') ?>" method="post" enctype="multipart/form-data">
                  <div class="row" style="margin-top:6%;">
                    <div class="col-lg-10  mx-auto ">
                      <div class=" form-group d-inline-flex border rounded-left rounded-right" style="width: 100%;padding: 0;margin: 0;">
                        <label class="my-auto" style="padding: 10px 25px 10px 25px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Nome</label>
                        <div class="my-auto d-inline-flex" style="width:80%">
                          <div class="d-inline-flex border-left" style="width:100%">
                            
                            <input class="form-control " style="border:0px;border-radius:0px" type="text" name="NomeCampanha">
                            <?php echo form_error('NomeCampanha', '<div style="color:red;font-size:0.9em">', '</div>'); ?>

                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top:6%;">
                    <div class="col-lg-10  mx-auto ">
                      <div class=" form-group d-inline-flex border rounded-left rounded-right" style="width: 100%;padding: 0;margin: 0;">
                        <label class="my-auto" style="padding: 10px 30px 10px 30px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Área</label>
                        <div class="my-auto d-inline-flex" style="width:100%">
                          <div class="d-inline-flex border-left" style="width:100%">
                            
                            <select  class="form-control" style="border:0" name="AreaInteresseCampanha">
                              <option value="0" disabled selected > -- Selecione uma Área de Interesse -- </option>
                              <option value="1">Agricultura</option>
						                	<option value="2">Arquitetura</option>
                              <option value="3">Comunicações</option>
                              <option value="4">Desporto</option>
                              <option value="5">Gastronomia</option>
                              <option value="6">Hotelaria</option>
                              <option value="7">Informática</option>
                              <option value="8">Lazer</option>
                              <option value="9">Logística</option>
                              <option value="10">Negócios Imobiliários</option>
                              <option value="11">Saúde</option>
                              <option value="12">Tecnologia</option>
                              <option value="13">Transportes</option>
                              <option value="14">Turismo</option>
                              <option value="15">Vestuário</option>
                            </select>
                            <?php echo form_error('AreaInteresseCampanha', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top:6%;">
                    <div class="col-lg-10  mx-auto ">
                      <div class=" form-group d-inline-flex border rounded-left rounded-right" style="width: 100%;padding: 0;margin: 0;">
                        <label class="my-auto" style="padding: 10px 27px 10px 27px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Início</label>
                        <div class="my-auto d-inline-flex" style="width:100%">
                          <div class="d-inline-flex border-left" style="width:100%">
                            
                              <input type="text" style="border:0" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="datainicio_campanha" placeholder="Introduza a Data de início da campanha">
                              <?php echo form_error('datainicio_campanha', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                               
                              </div>
                            
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  
                  <div class="row" style="margin-top:6%;">
                    <div class="col-lg-10  mx-auto ">
                      <div class=" form-group d-inline-flex border rounded-left rounded-right" style="width: 100%;padding: 0;margin: 0;">
                        <label class="my-auto" style="padding: 10px 32px 10px 32px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Fim</label>
                        <div class="my-auto d-inline-flex" style="width:100%">
                        <div class="d-inline-flex border-left" style="width:100%">
                            
                        <input type="text" style="border:0" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="datafim_campanha" placeholder="Introduza a Data de fim da campanha">
                            </div>
                            </div>
                            
                          </div>
                          
                        
                    </div>
                    
                  </div>
                  <div class="row" style="margin-top:8%;">
                    <div class="col-lg-10 mx-auto  ">
                      <div class=" form-group d-inline-flex border rounded-left rounded-right" >
                        <label class="my-auto" style="padding: 10px 16px 10px 16px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Sem Fim</label>
                        <div class="my-auto d-inline-flex">
                          <div class="d-inline-flex border-left">
                            <input type="checkbox" name="semfim_campanha"  style="width: 38px;height: 38px;">
                          
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="row" style="margin-top:6%;margin-bottom:6%;">
                    <div class="col-lg-10  mx-auto ">
                      <div class=" form-group d-inline-flex border rounded-left rounded-right" style="width: 100%;padding: 0;margin: 0;">
                        <label class="my-auto" style="padding: 29px 13px 25px 13px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Descrição</label>
                        <div class="d-inline-flex" style="width:80%">
                          <div class="d-inline-flex border-left" style="width:100%">
                            
                            <textarea class="form-control" style="border:0px;border-radius:0px;height:100%" type="text" name="DescricaoCampanha" > </textarea>
                            <?php echo form_error('DescricaoCampanha', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
  
                  
                </div>
                
              </div>
              
              
              
            </div>
            <div class="col-lg-6 ">
              <div class="card card-stats">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-10 mx-auto">
                      
                      <img src="<?php echo base_url('assets/img/CampanhaDefault.png'); ?>" class="border border-primary" style="border-color: #51cbce !important" id="img_logo" class="img_logo">
                      
                    </div>
                  </div>
                  <div class="row" style="margin-top:1%;">
                    <div class="mx-auto image-upload" style="cursor:pointer">
                    <label for="file-input">
                    Alterar Logótipo 
                    <i class="fa fa-plus text-primary"></i>
                    </label>

                    <input type="file" onchange="readURL(this);"  name="ImagemCampanha" id="file-input" />
                    </div>
                  </div>
                  <div class="row" style="margin-top:10%;">
                    <div class="col-lg-10 mx-auto text-center" style="font-size:0.5em">
                      <h5 >A publicação da Campanha poderá ser efetuada posteriormente no menu Campanhas</h5>
                    </div>
                  </div>
                  <div class="row" style="margin-top:1%;">
                    <div class="mx-auto">
                      <button class="btn" style="background-color:#007bff">Criar Campanha</button>
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


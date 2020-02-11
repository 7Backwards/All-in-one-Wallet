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
          <li >
            <a href="<?php echo base_url('index.php/Estatisticas_C'); ?>">
              <i class="fa fa-bar-chart"></i>
              <p>Estatísticas</p>
            </a>
          </li>
          <li >
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
          <li class="active">
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
      
      <div class="content">
        <div class="row">
          <div class="col-lg-11 mx-auto">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="card-title" style="margin-left:2%;margin-top:1%">
                    <h6 style="font-size:1.3em">Cartão de Fidelização</h6>
                  </div>
                </div>
                <form action="<?php echo site_url('CartaoFidelizacao_C/update') ?>" method="post" enctype="multipart/form-data" >
                <div class="row" style="margin-top:3%">
                  <div class=" mx-auto">
                    <img src="<?php echo base_url(); ?>LogotipoEstabelecimento/<?php echo $this->session->userdata('estabelecimento_filename_logotipo')?>" style="max-width:250px;max-height:250px" id="img_logo" class="img_logo">
                  </div>
                </div>
                <div class="row" style="margin-top:1%;">
                  <div class="mx-auto image-upload">
                  
    
    <label for="file-input">
    Alterar Logótipo 
      <i class="fa fa-plus text-primary"></i>
    </label>

    <input id="file-input" type="file" onchange="readURL(this);"  name="Logotipo"/>
                  </div>
                </div>
                
                <div class="row " style="margin-top:4%;">
                  <div class=" mx-auto ">
                    <div class="form-group d-inline-flex border rounded-left rounded-right">
                      <label class="my-auto" style="padding: 8px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Ganhar Pontos</label>
                      <div class="my-auto d-inline-flex">
                        
                        <div class="d-inline-flex border-right rounded-right" style="max-width:83px;">
                          
                          <input class="form-control" name="ganharpontos_input" style="border:0px;border-radius:0px" type="number" min="0.1" step="0.1" value="<?php echo $this->session->userdata('estabelecimento_ganharpontos')?>">
                          <i class="my-auto fa fa-euro" style="font-size:20px;margin-right:8px;color:#9A9A9A"></i>
                          
                        </div>
                        <div class="d-inline-flex my-auto">
                          <span style="padding-right: 7px;padding-top: 2.1%;padding-bottom: 3%;padding-left: 7px;font-size:0.9em">em Compras equivale a 1 Ponto</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row " style="margin-top:2%;">
                  <div class=" mx-auto ">
                    <div class=" form-group d-inline-flex border rounded-left rounded-right">
                      <label class="my-auto" style="padding: 8px 17px 8px 17px;background-color: #007bff;color: white;font-size: 0.9em;border-radius:3px 0px 0px 3px">Usar Pontos</label>
                      <div class="my-auto d-inline-flex">
                        <div class="d-inline-flex  my-auto">
                          <span  style="padding-right: 33px;padding-left: 33px;padding-top: 2.1%;padding-bottom: 3%;font-size:0.9em">1 Ponto é equivalente a</span>
                        </div>
                        <div class="d-inline-flex border-left" style="max-width:83px;">
                          
                          <input class="form-control" name="usarpontos_input" style="border:0px;border-radius:0px" type="number" min="0.1" step="0.1" value="<?php echo $this->session->userdata('estabelecimento_usarpontos')?>">
                          <i class="my-auto fa fa-euro" style="font-size:20px;margin-right:8px;color:#9A9A9A"></i>
                          
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <input type="submit" class="btn mx-auto" style="background-color:#007bff;margin-top:4%" value="Guardar">
                </div>
                </form>
                <div class="row">
                  <div class="col-sm-6 mx-auto text-center" style="font-size:12px;padding-bottom:2%">Alteração do plano de Pontos resultará no envio de uma notificação aos clientes fidelizados ao seu estabelecimento com vista a informar os mesmos</div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
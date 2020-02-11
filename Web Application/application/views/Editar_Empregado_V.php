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
            <li class="active">
              <a href="<?php echo base_url('index.php/Empregados_C'); ?>">
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
        <div class="content">
          <div class="row">
            <div class="col-md-8" style="margin-left:20%;">
              <div class="card card-user" >
                <div class="image">
                  <img src="<?php echo base_url('assets/img/bannerempregados.png'); ?>" alt="..." style="width:100%; height:100%;">
                </div>
                <div class="card-body">
                  <div class="author">
                    <a href="#">
                      <img class="avatar" src="<?php echo base_url('assets/img/empregados.png'); ?>" alt="...">
                    </a>
                <div class="card-header">
                  <h5 class="card-title"> Editar Empregado: <?php echo $info->NOME_EMPREGADO ?></h5>
                </div>
                <div class="card-body">
                <form class="login100-form validate-form mx-auto" method="post" action="<?php echo site_url('Empregados_C/Editar'); ?>">
                <input type="hidden" name="id" value="<?php echo $info->ID_EMPREGADO ?>">
                       <div class="row">
                      <div class="col-md-6" style="margin-left:25%">
                        <div class="form-group">
                          <label>Hieraquia de Empregado</label>
                          <input type="text" class="form-control" name="tipo" value="<?php echo $info->TIPO_EMPREGADO?>"required>
                          
                        </div>
                      </div>
                      
                    </div>
                                     
                    <div class="row">
                      <div class="col-md-6" style="margin-left:25%">
                        <div class="form-group">
                          <label>Email</label>
                          <input  class="form-control" type="text" name="email" value="<?php echo $info->EMAIL_EMPREGADO?>"readonly>
                        
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" style="margin-left:25%">
                        <div class="form-group">
                          <label>Sexo</label>
                          <input  class="form-control" type="text" name="Sexo"value="<?php echo $info->SEXO_EMPREGADO?>"readonly>
                         
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" style="margin-left:25%">
                        <div class="form-group">
                          <label>Estado</label>
                          <input  class="form-control" type="number" min="0" max="1" name="estado" value="<?php echo $info->ESTADO_EMPREGADO?>" required>
                          
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-md-6" style="margin-left:25%">
                        <div class="form-group">
                          <label>Cidade</label>
                          <input  class="form-control" type="text" name="cidade" value="<?php echo $info->CIDADE_EMPREGADO?>"readonly>
                         
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" style="margin-left:25%">
                        <div class="form-group">
                          <label>Data de Registo</label>
                          <input  class="form-control" type="text" name="data" value="<?php echo $info->date_creation?>"readonly>
                         
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Editar</button> 
                        <a href="<?php echo site_url('Empregados_C/index') ?>" class="btn btn-secundary btn-round">Cancelar</a>
                        
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
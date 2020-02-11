<body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="black" data-active-color="primary">
        <div class="logo">
          <a class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="<?php echo base_url('assets/img/AdminIcon.png'); ?>">
            </div>
          </a>
          <div class="simple-text logo-normal font-weight-light ">
            Bizdirect
          </div>
        </div>
        <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
              <a href="<?php echo site_url('EstatisticasAdmin_C'); ?>">
                <i class="fa fa-bar-chart"></i>
                <p>Estatísticas</p>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('ConfirmarRegistoAdmin_C'); ?>">
                <i class="fas fa-user-friends"></i>
                <p>Verificar Registo</p>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('Admins_C'); ?>">
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>Administradores</p>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('Admin_Comerciante_C'); ?>">
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>Comerciantes</p>
              </a>
            </li>
            <li class="active">
              <a href="<?php echo site_url('PerfilAdmin_C'); ?>">
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
            <div class="col-md-4 " >
              <div class="card card-user" style="text-align: center">
                <div>
                <img class="avatar" src="<?php echo base_url('assets/img/AdminIcon.png'); ?>" alt="...">
                </div>
                 <h5 class="text-dark" ><?php echo $this->session->userdata('admin_nome'); ?></h5>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Defini&ccedil;&otilde;es Conta</h5>
                </div>
                <div class="card-body">
                <form action="<?php echo site_url('PerfilAdmin_C/update') ?>" method="post" >
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" name="admin_nome" value="<?php echo $this->session->userdata('admin_nome'); ?>">
                          <?php echo form_error('admin_nome', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="admin_email"
                          value="<?php echo $this->session->userdata('admin_email'); ?>">
                          <?php echo form_error('admin_email', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="admin_password" value="examplePassword">
                          <?php echo form_error('admin_password', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                    
                    <hr size="15px">
                    <h5 class="card-title">Dados Pessoais</h5>
                    <br>
            
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Telemóvel</label>
                          <input  class="form-control" name="admin_telemovel" value="<?php echo $this->session->userdata('admin_telemovel'); ?>">
                          <?php echo form_error('admin_telemovel', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Atualizar</button>
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
 
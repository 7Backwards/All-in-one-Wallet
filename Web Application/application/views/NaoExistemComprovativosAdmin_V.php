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
            <li class="active">
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
            <li>
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

            <div class="col-lg-10 mx-auto">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row justify-content-center">
                  <h3 style="padding-top:30%;padding-bottom:30%">De momento não existem Registos por verificar!</h3>
                  </div>
                </div>
              </div>
            </div>
                   
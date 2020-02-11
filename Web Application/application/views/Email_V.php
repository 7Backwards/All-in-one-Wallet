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
          <li>
            <a href="<?php echo base_url('index.php/Perfil_C'); ?>">
              <i class="nc-icon nc-single-02"></i>
              <p>Perfil</p>
            </a>
          </li>
          <li class="active">
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
          
        </div>
        <div class="row">
          <div class="col-md-11 mx-auto">
            <div class="card">
              <div class="card-header" style="margin-left:15px;margin-right:15px">
                <div class="row">
                  <h6 class="card-title my-auto" style="font-size:1.5em">Enviar Mensagem aos seus Clientes</h6> 
                  
                </div>

              <div class="card-body">
                <form class="form" role="form" autocomplete="off" method="post" action="<?php echo site_url(); ?>/Email_C/sendemail">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">Titulo:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="titulo">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">Mensagem:</label>
                  <div class="col-sm-9">
                     <textarea class="form-control" id="exampleFormControlTextarea3" name="texto" rows="7"></textarea>
                     
                  </div>
                  </div>
                
                  
                </div>
                <div class="form-group row text-center">
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-success btn-lg" style="font-size:0.9em" value="Enviar!" >
                  </div>
                  <?php if(isset($msg))
                    echo $msg;
                    ?>
                </div>
              </form>
            </div>
          </div>
        </div>
        
     </div>
     <!--------------------CONTACTAR ADMINISTRADOR------------------>
     <div class="row">
          <div class="col-md-11 mx-auto">
            <div class="card">
              <div class="card-header" style="margin-left:15px;margin-right:15px">
                <div class="row">
                  <h6 class="card-title my-auto" style="font-size:1.5em">Contactar Administrador</h6> 
                  
                </div>

              <div class="card-body">
                <form class="form" role="form" autocomplete="off" method="post" action="<?php echo site_url(); ?>/Email_C/contactaradmin">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">Titulo:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="tituloa">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">Mensagem:</label>
                  <div class="col-sm-9">
                     <textarea class="form-control" id="exampleFormControlTextarea3" name="textoa" rows="7"></textarea>
                     
                  </div>
                  </div>
                
                  
                </div>
                <div class="form-group row text-center">
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-danger btn-lg" style="font-size:0.9em" value="Enviar!" >
                  </div>
                  <?php if(isset($msga))
                    echo $msga;
                    ?>
                </div>
              </form>
            </div>
          </div>
        </div>
        
     </div>
    </div>
  </div>

    
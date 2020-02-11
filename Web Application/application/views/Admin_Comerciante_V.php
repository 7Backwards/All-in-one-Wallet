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
            <li class="active">
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
          <div class="row">
            <div class="col-md-8 mx-auto">
              <div class="card card-user" >
                <div class="image">
                  <img src="<?php echo base_url('assets/img/bannerempregados.png'); ?>" alt="..." style="width:100%; height:100%;">
                </div>
                <div class="card-body">
                  <div class="author">
                    <a href="#">
                      <img class="avatar" src="<?php echo base_url('assets/img/empregados.png'); ?>" alt="...">
                    </a>
                    <?php if(isset($msga))
                    echo $msga;
                    ?>
                <div class="card-header">
                  <h5 class="card-title">Editar Comerciante: <?php if(isset($dados->NOME_COMERCIANTE)) echo $dados->NOME_COMERCIANTE; ?></h5>
                </div>
                <div class="card-body">
                <form class="login100-form validate-form mx-auto" method="post" action="<?php echo site_url('Admin_Comerciante_C/Editar'); ?>">

                <input type="hidden" name="id" value="<?php if(isset($dados->ID_COMERCIANTE)) echo $dados->ID_COMERCIANTE; ?>">   

                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="form-group">
                          <label>Estabelecimento</label>
                          <input  class="form-control" type="text" name="estabelecimento" value="<?php if(isset($dados->NOME_ESTABELECIMENTO)) echo $dados->NOME_ESTABELECIMENTO; ?>"readonly>
                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="<?php if(isset($dados->EMAIL_COMERCIANTE)) echo $dados->EMAIL_COMERCIANTE; ?>"readonly >
                        </div>
                      </div>
                      </div>
                      
                      
                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="form-group">
                          <label>Telemovel</label>
                          <input type="text" class="form-control" name="telemovel" value="<?php if(isset($dados->TELEMOVEL_COMERCIANTE)) echo $dados->TELEMOVEL_COMERCIANTE; ?>"readonly>
                        </div>
                      </div>
                      </div>
                      
                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="form-group">
                          <label>Estado</label>
                          <input type="number" class="form-control" name="estado" min="0" max="1" value="<?php if(isset($dados->ESTADO_COMERCIANTE)) echo $dados->ESTADO_COMERCIANTE; ?>">
                        </div>
                      </div>
                      </div>
                               
                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="form-group">
                          <label>Verificação Email</label>
                          <input type="text" class="form-control" name="email_verified" value="<?php if(isset($dados->is_email_verified)) echo $dados->is_email_verified; ?>" >
                        </div>
                      </div>
                      </div>
                      
                      
                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="form-group">
                          <label>Data Criacao</label>
                          <input type="text" class="form-control" name="data"value="<?php if(isset($dados->date_creation)) echo $dados->date_creation; ?>"readonly >
                        </div>
                      </div>
                      </div>
                      
                      
                    <div class="row">
                      <div class="ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Adicionar</button>
                        <a href="<?php echo site_url('Admin_Comerciante_C/index') ?>" class="btn btn-secundary btn-round">Cancelar</a>
                       
                      </div>
                    </div>
                  </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
        <div class="card-header ">
          <h5 class="card-title">Comerciantes</h5>
        </div>
        <div class="card-body">
          
          <table id="AdministradoresTable" class="table table-striped display">
            <thead>
              <tr>
                <th class="th-sm">Nome</th>
                <th class="th-sm">Estabelecimento</th>
                <th class="th-sm">Email</th>
                <th class="th-sm">Telemovel</th>
                <th class="th-sm">Estado</th>
                <th class="th-sm">Verificação Email</th>
                <th class="th-sm">Data Criacao</th>
                <th class="th-sm">Verificação Email</th>
                <th class="th-sm"> </th>
             </tr>
            </thead>
            <tbody>
            <?php foreach ($Comerciantes as $Comerciante): ?>
      <tr>
        <td><?php echo $Comerciante['NOME_COMERCIANTE'] ?></td>
        <td><?php echo $Comerciante['NOME_ESTABELECIMENTO'] ?></td>
        <td><?php echo $Comerciante['EMAIL_COMERCIANTE'] ?></td>
        <td><?php echo $Comerciante['TELEMOVEL_COMERCIANTE'] ?></td>
        <td><?php echo $Comerciante['ESTADO_COMERCIANTE'] ?></td>
        <td><?php echo $Comerciante['is_email_verified'] ?></td>
        <td><?php echo $Comerciante['date_creation'] ?></td>
        <td><a href="<?php echo site_url("Admin_Comerciante_C/editar/".$Comerciante['ID_COMERCIANTE']);?>"><i style="font-size:2em;color:dodgerblue" class="fas fa-user-edit"></i></a></td>
      </tr>
       <?php endforeach ?>
            </tbody>
          </table>
          
        </div>
      </div>

    </body>
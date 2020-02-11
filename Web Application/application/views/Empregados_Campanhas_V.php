  
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
          <li class="active">
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
          
          <li >
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
            <div class="col-lg-11 mx-auto ">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="card-title" style="margin-left:2%">
                      <h6 style="font-size:1.5em">Campanhas</h6>
                    </div>
                    
                    
                    
                  </div>
                
                  <?php $counter=0 ?>
                  <?php foreach($Campanhas as $Campanha): ?>
                  <?php if ($counter % 3 == 0) {
                echo '<div class="row" style="margin-top:2.5%;margin-bottom:2.5%">';
            } ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 text-center ">
                      <img src="<?php if($Campanha->FILENAME_LOGOTIPO_CAMPANHA == NULL) {
                        echo base_url('assets/img/CampanhaDefault.png');}
                        else {echo base_url(); ?>LogotipoCampanhas/<?php echo $Campanha->FILENAME_LOGOTIPO_CAMPANHA;
                        }?>" class="border border-primary" style="border-color: #51cbce !important; height:300px !important"> 
                      <div>
                        
                      </div>
                      
                      <div class="row justify-content-center " style="margin-top:2%">
                        <h5 class="font-weight-bold my-auto" style="font-size:12px;">Nome:</h5><h5 style="font-size:12px;padding-left:5px" class="my-auto"><?php echo $Campanha->NOME_CAMPANHA ?></h5>
                      </div>
                      <div class="row justify-content-center" style="margin-top:2%">
                        <h5 class="font-weight-bold my-auto" style="font-size:12px;">Data Início:</h5><h5 style="font-size:12px;padding-left:5px" class="my-auto"><?php echo $Campanha->DATA_INICIO_CAMPANHA ?></h5>
                      </div>
                      <div class="row justify-content-center" style="margin-top:2%">
                        <h5 class="font-weight-bold my-auto" style="font-size:12px;">Data Fim:</h5><h5 style="font-size:12px;padding-left:5px" class="my-auto"><?php echo $Campanha->DATA_FIM_CAMPANHA ?></h5>
                      </div>
                      <div class="row justify-content-center" style="margin-top:2%">
                        <h5 class="font-weight-bold my-auto" style="font-size:12px;">Estado:</h5><h5 style="font-size:12px;padding-left:5px" class="my-auto"><?php if($Campanha->ESTADO_PUBLICACAO_CAMPANHA == 0){ echo 'Não Publicada'; }else{ echo 'Publicada';} ?></h5>
                      </div>
                      <div class="row justify-content-center" style="margin-top:2%">
                        <h5 class="font-weight-bold my-auto" style="font-size:12px;">Área de Interesse:</h5><h5 style="font-size:12px;padding-left:5px" class="my-auto"><?php echo $Campanha->NOME_AREAINTERESSE ?></h5>
                      </div>
                      <div class="row justify-content-center" style="margin-top:2%">
                        <h5 class="font-weight-bold my-auto" style="font-size:12px;">Descrição:</h5><h5 style="font-size:12px;padding-left:5px" class="my-auto"><?php echo $Campanha->DESCRICAO_CAMPANHA ?></h5>
                      </div>
                      
                      
                    </div>
                    <?php
                    if ($counter % 2 == 0 && $counter != 0 ) {
                       echo '</div>';
                    }

                    $counter++;?>
                    <?php endforeach ?>
                  </div>
                  
                  
                  
                
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

<div class="modal" id="Recusarmodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?php echo base_url() ?>index.php/ConfirmarRegistoAdmin_C/recusar/<?php echo $Informacao[0]->ID_COMERCIANTE; ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title ">Recusar Comerciante</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="row">
      <div class="col-lg-10 mx-auto">
      <div class="form-group ">
      <label>Descreva a razão para não aceitação do comerciante:</label>
        <textarea required class="form-control" rows="10" name="Razao_input" > </textarea>
      </div>
      </div>
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger mx-auto" >Recusar</button>
      </div>
</form>
    </div>
  </div>
</div>



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
            <li class="">
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
        
        <div class="content ">
          <div class="row">

            <div class="col-lg-4" >
              <div class="card card-stats" style="height:100%">
                <div class="card-body">
                  <div class="row">
                    <div class="card-title mx-auto" >
                      <h6 style="font-size:1.5em">Comerciante</h6>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Nome</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->NOME_COMERCIANTE; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">NIF</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->NIF_COMERCIANTE; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Email</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->EMAIL_COMERCIANTE; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Data de Nascimento</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->DATA_NASCIMENTO; ?>">
                        </div>
                      </div>
                      
                    </div>
                  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Sexo</label>
                          <input type="text" class="form-control" disabled="" value="<?php if($Informacao[0]->SEXO == 0) 
                          {
                            echo "Masculino";
                          }
                          else if($Informacao[0]->SEXO == 1) {
                            echo "Feminino";
                          }
                          else {
                            echo "Outro";
                          } ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Telemóvel</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->TELEMOVEL_COMERCIANTE; ?>">
                        </div>
                      </div>
                      
                    </div>

            

                </div>
              </div>
            </div>

            <div class="col-lg-4" >
              <div class="card card-stats" style="height:100%">
                <div class="card-body">
                  <div class="row">
                    <div class=" mx-auto" >
                      <h6 style="font-size:1.5em">Estabelecimento</h6>
                    </div>
                    
                  </div>
                  <div class="row" style="margin-top:2%">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Nome</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->NOME_ESTABELECIMENTO; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Morada</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->MORADA_ESTABELECIMENTO; ?>">
                        </div>
                      </div>
                      
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Código Postal</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->CODIGO_POSTAL_ESTABELECIMENTO; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Cidade</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Informacao[0]->CIDADE_ESTABELECIMENTO; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Áreas de Interesse</label>
                          <input type="text" class="form-control" disabled="" value="<?php echo $Areas_de_interesse; ?>">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label style="color:blue">Descrição</label>
                          <textarea type="text" rows="4" cols="50" class="form-control" disabled="" ><?php echo $Informacao[0]->DESCRICAO_ESTABELECIMENTO; ?>
                         </textarea>
                        </div>
                      </div>
                      
                    </div>
          

                </div>
              </div>
            </div>
            <div class="col-lg-4" >
              <div class="card card-stats" style="height:100%">
                <div class="card-body" >
                  <div class="row">
                    <div class="card-title mx-auto" >
                      <h6 style="font-size:1.5em">Comprovativo</h6>
                    </div>
                   </div>

                    <div class="row" style="margin-top:6%;">
                    <div class="mx-auto">
                    <a href="<?php echo base_url(); ?>VerificarComerciante/<?php echo $Informacao[0]->FILENAME_COMPROVATIVO ?>" target="_blank"><i style="font-size:3em;color:blue" class="far fa-file-alt"></i></a>
                    </div>
                  </div>
                  </div>

				<div class="card-title mx-auto" style="margin-top: 15%;">
                      <h6 style="font-size:1.5em">Logótipo</h6>
                    </div>
				
				<div class="row" style="margin-bottom: 35%;">
                  			<div class="mx-auto">
                        <img src="<?php echo base_url(); ?>LogotipoEstabelecimento/<?php echo $Informacao[0]->FILENAME_LOGOTIPO ?>" style="max-width:250px;max-height:250px" id="img_logo" class="img_logo">
                    </div>
                  </div>
			  </div>
			</div>

			<div class="col-lg-12" >
              
                
                  <div class="row">
                  <div class="mx-auto">
                    <button class="btn btn-success btn-lg" onclick="window.location='<?php echo site_url("ConfirmarRegistoAdmin_C/aceitar/".$Informacao[0]->ID_COMERCIANTE);?>'">aceitar</button>
                    <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#Recusarmodal" >Recusar</button>
                    </div>
                    </div>               
			  </div>
			</div>

          </div>
        </div>
      </div>
    </div>

    

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
            <li class="active">
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        <i class="fas fa-user text-danger"></i>                        
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Total Comerciantes</p>
                        <p class="card-title">
                        <?php 
                          echo $totalComerciantes;
                        ?>
                          <p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-5 col-md-4">
                          <div class="icon-big text-center icon-warning">
                            <i class="fas fa-users text-primary"></i>
                          </div>
                        </div>
                        <div class="col-7 col-md-8">
                          <div class="numbers">
                            <p class="card-category">Total Clientes</p>
                            <p class="card-title">
                            <?php 
                                echo $totalClientes;
                            ?>
                              <p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer ">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-5 col-md-4">
                              <div class="icon-big text-center icon-warning">
                                <i class="fas fa-hand-holding-usd text-success"></i>                                
                              </div>
                            </div>
                            <div class="col-7 col-md-8">
                              <div class="numbers">
                                <p class="card-category">Total Campanhas</p>
                                <p class="card-title">
                                <?php 
                                     echo $totalCampanhas;
                                 ?>
                                  <p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer ">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-body ">
                              <div class="row">
                                <div class="col-5 col-md-4">
                                  <div class="icon-big text-center icon-warning">
                                    <i class="fas fa-star text-warning"></i>
                                  </div>
                                </div>
                                <div class="col-7 col-md-8">
                                  <div class="numbers">
                                    <p class="card-category">Verificar Registo</p>
                                    <p class="card-title"> <?php 
                                    echo $totalRegistoComerciantes;
                                 ?>
                                      <p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-7">
                              <div class="card">
                                <div class="card-header ">
                                  <h5 class="card-title">N&uacute;mero de Comerciantes</h5>
                                  
                                </div>
                                <div class="card-body">
                                  <canvas id="PontosChart" height="300"></canvas>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="card ">
                                <div class="card-header ">
                                  <h5 class="card-title">Plano Comerciantes</h5>
                                  
                                 </div>
                                <div class="card-body ">
                                <?php
                                      $valorT=$planoFree+$planoPro+$planoPremium;
                                      if($valorT<10)
                                      {
                                        echo "Não é possivel mostrar o gráficos porque não há dados suficientes";
                                      }
                                      else
                                      {
                                        echo "<canvas id='CampanhasChart' height='300'></canvas>";
                                      }
                                ?>
                                  
                                </div>
                                
                                
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header ">
                                  <h5 class="card-title">Número de Clientes</h5>
                                </div>
                                <div class="card-body">
                                  <canvas id="VendasChart" height="300"></canvas>
                                </div>
                                
                              </div>
                            </div>
                     
                          </div>
                          
                        </div>
                      </div>
                    </div>

          <script>

var ctxP = document.getElementById("PontosChart");
var date= new Date();
  var current_year= 1900 + date.getYear(); 
if(ctxP){
  var myChart = new Chart(ctxP, {
    type: 'bar',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
      datasets: [
        {
        label: current_year,
        data: ["<?php echo $c_janeiro;?>", "<?php echo $c_fevereiro;?>", "<?php echo $c_marco;?>", "<?php echo $c_abril;?>",
        "<?php echo $c_maio;?>","<?php echo $c_junho;?>","<?php echo $c_julho;?>","<?php echo $c_agosto;?>",
        "<?php echo $c_setembro;?>","<?php echo $c_outubro;?>","<?php echo $c_novembro;?>","<?php echo $c_dezembro;?>"],
        backgroundColor: [
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)',
          'rgba(105, 0, 132, .2)'
        ],
        borderColor: [
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)',
          'rgba(200, 99, 132, .7)'
        ],
        borderWidth: 1
      },
  
    ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
}

var ctxL = document.getElementById("VendasChart");
  var date= new Date();
  var current_year= 1900 + date.getYear(); 
  if(ctxL){
  var myLineChart = new Chart(ctxL, {
    
  type: 'line',
  data: {
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
    datasets: [{
      label: current_year,
        data: ["<?php echo $v_janeiro; ?>", "<?php echo $v_fevereiro; ?>", "<?php echo $v_marco; ?>", "<?php echo $v_abril; ?>",
        "<?php echo $v_maio; ?>","<?php echo $v_junho; ?>" ,"<?php echo $v_julho; ?>" ,"<?php echo $v_agosto; ?>" ,"<?php echo $v_setembro; ?>" ,
        "<?php echo $v_outubro; ?>" ,"<?php echo $v_novembro; ?>" ,"<?php echo $v_dezembro; ?>" ],
        backgroundColor: [
          'rgba(0, 137, 132, .2)',
        ],
        borderColor: [
          'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 2
        
      },
     /* {
        label: "2018",
        data: [3, 5, 10, 15, 23, 42, 82,97,123,100,140,156],
        backgroundColor: [
          'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
          'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 2
      }*/
    ]
  },
  options: {
    maintainAspectRatio: false,
    responsive: true
  }
});
}


var ctxD = document.getElementById("CampanhasChart");
  if(ctxD){
  var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
      labels: ["Free", "Pro", "Premium"],
      datasets: [{
        data: ["<?php echo $planoFree; ?>","<?php echo $planoPro; ?>","<?php echo $planoPremium; ?>"],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
      }]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true
    }
  });
}

          </script>
                    
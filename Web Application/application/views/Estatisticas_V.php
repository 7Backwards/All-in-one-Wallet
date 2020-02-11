
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
            <li class="active">
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
        
        <div class="content">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        <i class="fas fa-bullhorn text-warning" style='font-size:41px'></i>
                        
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Campanhas Ativas</p>
                        <p class="card-title">
                          <?php
                         echo $campanhasAtivas;
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
                            <i class="fas fa-exclamation-triangle text-success"></i>
                          </div>
                        </div>
                        <div class="col-7 col-md-8">
                          <div class="numbers">
                            <p class="card-category">Campanhas a Expirar</p>
                            <p class="card-title">
                              <?php 
                                echo $totalExpirarC;
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
                                <i class="fas fa-users text-danger"></i>
                                
                              </div>
                            </div>
                            <div class="col-7 col-md-8">
                              <div class="numbers">
                                <p class="card-category">Número de Clientes</p>
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
                            <div class="card-body ">
                              <div class="row">
                                <div class="col-5 col-md-4">
                                  <div class="icon-big text-center icon-warning">
                                    <i class="fas fa-star text-primary"></i>
                                  </div>
                                </div>
                                <div class="col-7 col-md-8">
                                  <div class="numbers">
                                    <p class="card-category">Total de Clientes do Mercado</p>
                                    <p class="card-title">
                                    <?php
                                    
                                      
                                      if($totalClientes <1 || $total_clientes_site <1)
                                      {
                                        echo 0;
                                      }
                                      else
                                      {
                                        $clientesSiteT= round(($total_clientes/$total_clientes_site),3)*100;
                                      echo $clientesSiteT ."%";

                                      }
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
                                  <h5 class="card-title">Valor de Vendas</h5>
                                  
                                </div>
                                <div class="card-body">
                                  <canvas id="VendasChart" height="300"></canvas>
                                </div>
                              </div>
                            </div>
                            <!-- -------------------Grafico Redondo------------->
                            <div class="col-md-5">
                              <div class="card ">
                                <div class="card-header ">
                                  <h5 class="card-title">Horários de Consumo</h5>
                                  
                                </div>
                                <div class="card-body ">
                                <?php
                                  if($horas_manha <1 && $horas_almoco <1 && $horas_tarde <1)
                                  echo "Não há informação para mostrar";
                                  else
                                  echo "<canvas id='CampanhasChart' height='300'></canvas>";
                                ?>
                                  
                                </div>
                                
                                
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-7">
                              <div class="card">
                                <div class="card-header ">
                                  <h5 class="card-title">Número de Vendas</h5>
                                </div>
                                <div class="card-body">
                                  <canvas id="PontosChart" height="300"></canvas>
                                </div>
                                
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="card ">
                                <div class="card-header ">
                                  <h5 class="card-title">Notificações</h5>
                                  
                                </div>
                                <div class="card-body ">
                                <?php 
                               $valorT= $totalcamapnhasativas+$totalcamapnhasnativas;
                                if($valorT<10) 
                                {
                                    echo "Não é possivel mostrar o gráfico porque não ha dados suficientes";
                                }
                                    else
                                    {
                                    echo "<canvas id='FaixaEtariaChart' height='300'></canvas>";
                                    }
                                 ?>
                                 
                                </div>
                                
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                
                    </div>
                   
                    
    <script>
    
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
      labels: ["Manhã", "Almoço", "Tarde"],
      datasets: [{
        data: ["<?php echo $horas_manha;?>","<?php echo $horas_almoco;?>","<?php echo $horas_tarde;?>"],
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

 
var ctxP = document.getElementById("PontosChart");
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
     /* {
        label: '2019',
        data: [ 7, 2, 17, 23, 41, 50, 12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)',
          'rgba(0, 137, 132, .2)'
        ],
        borderColor: [
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)',
          'rgba(0, 10, 130, .7)'
        ],
        borderWidth: 1
      }*/
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
var ctxF = document.getElementById("FaixaEtariaChart");
 if(ctxF){
  var myChart = new Chart(ctxF, {
    type: 'bar',
    data: {
      labels: ["Ativas","Desativas"],
      datasets: [
        {
        data: ["<?php echo $totalcamapnhasativas ;?>","<?php echo $totalcamapnhasnativas; ?>"],
        backgroundColor: [
          '#F7464A',
          '#F7464A',
          '#F7464A',
          '#F7464A',
          '#F7464A',
          '#F7464A'
          
        ],
        borderColor: [
          '#F7464A',
          '#F7464A',
          '#F7464A',
          '#F7464A',
          '#F7464A',
          '#F7464A'
        ],
        borderWidth: 1
      },
     
    
    
    ]
    },
  
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false
    },
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

</script>
    
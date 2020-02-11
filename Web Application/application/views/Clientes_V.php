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
          <li class="active">
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header ">
                <h5 class="card-title">Número de Clientes</h5>
              </div>
              <div class="card-body">
                <canvas id="ClienteChart" height="300"></canvas>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <center><p class="card-title" style="font-size:22px">Ultima Semana
                </p></center>
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <?php
                    if($totallastweek<1||$totalclientes<1 )
                    {
                        echo 0 ."%";
                    }
                    else
                    {
                      $valorlastweek= round(($totallastweek/$totalclientes),3)*100;
                      if($valorlastweek >0)
                      {
                        echo ' <i class="fas fa-arrow-up text-success" style="font-size:35px">&nbsp;'.$valorlastweek.'% </i>';
                      }
                      else
                      {
                        echo ' <i class="fas fa-arrow-down" style="font-size:35px;color:red">&nbsp;'.$valorlastweek.'% </i>';
                      }
                    }
                   
                    ?>   
                   </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category" style="padding-top:20px;font-size:20px"><?php
                        echo "&nbsp;&nbsp;".$totallastweek ." Novos Clientes";
                      ?>
                      </p>
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
                <center><p class="card-title" style="font-size:22px">Ultimo Mês</p></center>
                
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <?php
                    if($lastmonth <1 ||$totalclientes<1)
                    {
                      echo 0 ."%";
                    }
                    else
                    {
                      $valor= round(($lastmonth/$totalclientes),3)*100;
                      if($valor >0)
                      {
                        echo ' <i class="fas fa-arrow-up text-success" style="font-size:35px">&nbsp;'.$valor.'% </i>';
                      }
                      else
                      {
                        echo ' <i class="fas fa-arrow-down" style="font-size:35px;color:red">&nbsp;'.$valor.'% </i>';
                      }
                    }
                   
                    ?>                                   
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category" style="padding-top:20px;font-size:20px">
                      <?php
                        echo "&nbsp;&nbsp;".$lastmonth ." Novos Clientes";
                      ?>
                    
                      </p>
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
                <center><p class="card-title" style="font-size:22px">Ultimos 6 Meses
                </p></center>
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <?php
                    if($lastsixmonth <1 || $totalclientes<1)
                    {
                        echo 0 ."%";
                    }
                    else
                    {
                      $valorsixmonth= round(($lastsixmonth/$totalclientes),3)*100;
                      if($valorsixmonth >0)
                      {
                        echo '<i class="fas fa-arrow-up text-success" style="font-size:35px">&nbsp;'.$valorsixmonth.'% </i>';
                      }
                      else
                      {
                        echo ' <i class="fas fa-arrow-down" style="font-size:35px;color:red">&nbsp;'.$valorsixmonth.'% </i>';
                      }
                    }
                   
                    ?>       

                                 
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category" style="padding-top:20px;font-size:20px">
                      <?php
                        echo "&nbsp;&nbsp;".$lastsixmonth."&nbsp;Novos Clientes";
                      ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header ">
            <h5 class="card-title">Clientes</h5>
          </div>
          <div class="card-body">
            <table id="ClientesTable" class="table table-striped display">
              <thead>
                <tr>
                  <th class="th-sm">Número</th>
                  <th class="th-sm">Nome</th>
                  <th class="th-sm">Cidade</th>
                  <th class="th-sm">Nº Telem&oacute;vel</th>
                  <th class="th-sm">Pontos</th>
                  <th class="th-sm">Cliente desde</th>
                  <!-- <th class="th-sm">Total Compras</th> -->
                </tr>
              </thead>
              <tbody>
    <?php foreach ($Clientes as $Cliente): ?>
    <tr>
        <td><?php echo $Cliente['ID_CLIENTE'] ?></td>
        <td><?php echo $Cliente['NOME_CLIENTE'] ?></td>
        <td><?php echo $Cliente['CIDADE_CLIENTE'] ?></td> 
        <td><?php echo $Cliente['TELEMOVEL_CLIENTE'] ?></td> 
        <td><?php echo $Cliente['PONTOS_CARTAO'] ?></td>
        <td><?php echo $Cliente['date_creation'] ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  var ctxC = document.getElementById("ClienteChart");
  var date= new Date();
  var current_year= 1900 + date.getYear(); 
  if(ctxC){
  var myChart = new Chart(ctxC, {
    type: 'line',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
      datasets: [{
          label: current_year,
          data: [<?php echo $janeiro; ?>,<?php echo $fevereiro; ?>,<?php echo $marco; ?>,<?php echo $abril; ?>,<?php echo $maio; ?> ,
          <?php echo $junho; ?> ,<?php echo $julho; ?> ,<?php echo $agosto; ?> ,<?php echo $setembro; ?> ,<?php echo $outubro; ?> ,
          <?php echo $novembro; ?> ,<?php echo $dezembro; ?> ],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
        },
      ]
    },
    options: {
      maintainAspectRatio: false,
      responsive: true
    }
  });
  
}
</script>

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
          <li>
            <a href="<?php echo base_url('index.php/Empregados_Campanhas_C/Mostrar'); ?>">
              <i class="fas fa-bullhorn"></i>
              <p>Campanhas</p>
            </a>
          </li>
          <li class="active">
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
          
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="margin-left:15px;margin-right:15px">
                <div class="row">
                  <h6 class="card-title my-auto" style="font-size:1.5em">Registar Transa&ccedil;&atilde;o</h6>
                  <button type="button" class="btn ml-auto btn-success" id="QRCodeTransacoes"  >Leitor QRCode Não Ativo</button>
                </div>
              </div>
              <div class="card-body">
                <form action="<?php echo site_url('Empregados_Transacoes_C/registo') ?>" method="post">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">ID Cartão:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" id="id_cartao" name="id_cartao" oninput="Updatepontos();" >
                      <?php echo form_error('id_cartao', '<div style="color:red;font-size:0.9em">', '</div>'); ?>
                      <?php if(isset($cliente_nao_existe)) echo '<div style="color:red;font-size:0.9em">' .$cliente_nao_existe. '</div>';?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">Campanhas disponíveis:</label>
                    <div class="col-sm-9">
                      <select id="user_campanha" class="form-control"  oninput="CampanhasSelected(this.options[this.selectedIndex])" >
                        <option disabled selected value> -- Selecione uma Campanha -- </option>
                        <?php foreach ($Campanhas as $Campanha): ?>
                         
                           <?php echo "<option value='";
                            echo $Campanha->ID_CAMPANHA;
                             echo "'>";
                               echo $Campanha->NOME_CAMPANHA;
                                echo "</option>";
                                  ?>
                          
                        
                        <?php endforeach ?>
                      </select>
        
                      
                    </div>
                  </div>
                  <div id="alertCampanhaSelecionada" class="col-sm-12" onclick="this.style.display='none';document.getElementById('user_campanha').disabled=false">
                    
                    <center><span >Campanha já selecionada</span></center>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">Campanhas selecionadas:</label>
                    <div class="col-sm-9">
                      <div class="form-control" style="min-height:40px;height:auto !important;" id="CampanhasSelecionadas"></div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto" >Total da Compra:</label>
                    <div class="col-sm-2 d-inline-flex" style="max-width:128px;">
                      
                      <input class="form-control" type="number" step="0.01" min="0.00" id="total_compra" oninput="TotalPagar();Updatepontos()" >
                      
                    <i class="my-auto fa fa-euro" style="margin-left:8px;font-size:20px;color:#9A9A9A"></i></span>
                   
                  </div>
                  <?php echo form_error('total_pagar', '<div class="my-auto" style="color:red;font-size:0.9em">', '</div>'); ?>
                </div>
                
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto">O Cliente tem <input type="text" readonly id="Pontos_cliente" name="Pontos_do_cliente"  style="border:0;width:10%;color:#51cbce"> pontos</label>
                    <div class="col-sm-9">
                      <input type="button" class="btn btn-primary" style="border-radius:20px" value="Utilizar Pontos" onclick="UtilizarPontos()">
                    </div>
                  </div>
                 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label my-auto" >Total a Pagar:</label>
                    <div class="col-sm-2 d-inline-flex" style="max-width:128px;">
                      
                      <input class="form-control" type="number" step="0.01" readonly id="total_pagar" name="total_pagar">
                    <i class="my-auto fa fa-euro" style="margin-left:8px;font-size:20px;color:#9A9A9A"></i></span>
                  </div>
                  
                </div>
                <div class="form-group row text-center">
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-dark btn-lg" value="Registar" >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header ">
          <h5 class="card-title">Transa&ccedil;&otilde;es</h5>
        </div>
        <div class="card-body">
          
          <table id="TransacoesTable" class="table table-striped display">
            <thead>
              <tr>
                <th class="th-sm">Número</th>
                <th class="th-sm">Cliente</th>
                <th class="th-sm">Total Pago</th>
                <th class="th-sm">Pontos Angariados</th>
                <th class="th-sm">Pontos Descontados</th>
                <th class="th-sm">Responsável</th>
                <th class="th-sm">Data</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($Transacoes as $Transacao): ?>
      <tr>
        <td><?php echo $Transacao['ID_TRANSACAO'] ?></td>
        <td><?php echo $Transacao['NOME_CLIENTE'] ?></td>
        <td><?php echo $Transacao['VALOR_TRANSACAO'] ?></td> 
        <td><?php echo $Transacao['PONTOS_GANHOS'] ?></td> 
        <td><?php echo $Transacao['PONTOS_DESCONTADOS'] ?></td>
        <td><?php echo $Transacao['NOME_RESPONSAVEL'] ?></td>
        <td><?php echo $Transacao['DATA_TRANSACAO'] ?></td>
      </tr>
       <?php endforeach ?>
            </tbody>
          </table>
          
        </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
function Updatepontos() {
      var id_cartao= document.getElementById('id_cartao').value;
      
      <?php
      $arr = []; //create empty array

foreach($Clientes as $Cliente) {
    $arr[] = array(
                'ID' => $Cliente['ID_CARTAO'],
                'PONTOS_CARTAO' => $Cliente['PONTOS_CARTAO']
                
            );         
}
?>
var arrayclientes = <?php echo json_encode($arr)?>;
var i;
for (i = 0; i < arrayclientes.length; i++) { 
  if(id_cartao == arrayclientes[i]['ID']) {
    document.getElementById('Pontos_cliente').value = arrayclientes[i]['PONTOS_CARTAO']; 
    return;
  }
}
document.getElementById('Pontos_cliente').value= "";
}

function TotalPagar() {
  var total_compra=document.getElementById('total_compra').value;
  document.getElementById('total_pagar').value= total_compra;
}

function UtilizarPontos() {
  if(document.getElementById('total_pagar').value && document.getElementById('Pontos_cliente').value != '0' && document.getElementById('Pontos_cliente').value) {
    var ganharpontos= <?php echo $ganhar_pontos ?>;
    var usarpontos= <?php echo $usar_pontos ?>;
    var total_pagar=document.getElementById('total_pagar').value;
    var pontos =document.getElementById('Pontos_cliente').value;
    var i;
    for(i=pontos;i>0;i--) {
      if((total_pagar - (i  * usarpontos)) > 0) {
        var total_a_pagar= total_pagar - (i  * usarpontos);
        document.getElementById('total_pagar').value= total_a_pagar.toFixed(2);
        document.getElementById('Pontos_cliente').value = pontos- i;
        return;
      }
    }
    

  }
}

</script>

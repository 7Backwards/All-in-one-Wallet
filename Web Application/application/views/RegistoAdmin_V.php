<?php
defined('BASEPATH') OR exit('URL inválida.');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Completar Registo</title>
        <!--stylesheets-->
        <link rel="stylesheet" href="<?php echo base_url('assets/bundles/css/style.css'); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/bundles/images/icons/favicon.ico'); ?>"/>
        <!--===============================================================================================-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="page" class="row" style="height:100%">
            <img src="<?php echo base_url('assets/images/logo.svg'); ?>" class="logobiz">
            <div class="col-lg-6 my-auto">
                    <img src="<?php echo base_url('assets/images/LogInPhoto.png'); ?>" alt="" style="width:100%">
                </div>
            
            <div class="col-lg-6 my-auto ">
            <form class="login100-form validate-form mx-auto" method="post" action="<?php echo site_url(); ?>/ConfirmRegistoAdmin_C/AdicionarAdmin/<?php echo $this->uri->segment(3);?>">
                    <span class="login100-form-title">
                        Complete o seu registo
                    </span>

                    <div class="row">
                        <div class="col-md-12">
                            <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Nome:</span>
                        </div>
                        <div class="col-md-12 mx-auto" >
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="nomeA" readonly value="<?php echo $dados->NOME_ADMIN; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Email:</span>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="emailA" readonly value="<?php echo $dados->EMAIL_ADMIN; ?>">  
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                    
                                      
                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Password:</span>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" id="password" name="password" required minlength=6 >   
                                <span class="focus-input100"></span>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block; ">Confirmar password:</span>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password"  id="confirm_password" name="confirm_password" required minlength=6>  
                                <span id='message'></span> 
                               
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                     </div>

                    <div class="row">
                    <div class="col-md-12">
                        <span style="font-family: Poppins-Bold;font-size: 18px;color: #333333; display: block;">Telemovel:</span>
                        </div>
                        <div class="col-md-12 mx-auto">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="number" name="telemovel" required minlength=9>   
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                         <div class="row">
                        
                        <div class="col-md-12 mx-auto" style="margin-top:25px;">
                            <div class="wrap-input100 validate-input">
                            <input class="login100-form-btn" type="submit" id="submitForm" value="Completar Registo!" >    
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>

                </form>
              
            </div>
        </div>
        <script>
        $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
          $('#message').html('Palavra-Passe Certa').css('color', 'green');
        } else 
      $('#message').html('Palavra-Passe Errada').css('color', 'red');
      }
      );
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
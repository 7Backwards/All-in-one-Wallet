<?php
defined('BASEPATH') OR exit('URL inválida.');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!--stylesheets-->
        <link rel="stylesheet" href="<?php echo base_url('assets/bundles/css/style.css'); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/CartaoAllinOneWallet.png'); ?>">
        <!--===============================================================================================-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    </head>
    <body>
    <div class="text-center text-danger" style="font-size:1em">
    <?php if(ISSET($message_verifiqueEmail)) {
                 echo $message_verifiqueEmail;
            }?>
            <?php if(ISSET($message_verificarconta)) {
                 echo $message_verificarconta;
            }?>
            <?php if(ISSET($message_mudar_email)) {
                 echo $message_mudar_email;
            }?>
             <?php if(ISSET($message_verificardados)) {
                 echo $message_verificardados;
            }?>
            </div>
            <?php if(ISSET($sucesso)) {
                 echo $sucesso;
            }?>
        <div id="page" class="row" style="height:100%">
            <img src="<?php echo base_url('assets/images/logo.svg'); ?>" class="logobiz">
            <div class="col-lg-6 my-auto">
                    <img src="<?php echo base_url('assets/images/LogInPhoto.png'); ?>" alt="" style="width:100%">
                </div>
                
            <div class="col-lg-6 my-auto ">
            
            <div class="text-center text-danger" style="font-size:0.5em">
                    <?php if(ISSET($message_passwordreset)) {
                 echo $message_passwordreset;
            }?>
           
            </div>
                <div class="login100-form validate-form mx-auto">
  
                    <span class="login100-form-title">
                        Iniciar Sessão
                    </span>
            
                    <?php echo form_open('Ctr_geral/login'); ?>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" id="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password" id="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <?php
            if(ISSET($message)) {
                 echo $message;
            }
               
          ?>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                        Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <a class="txt2" href="<?php echo site_url('ctr_geral/recuperar_pass')?>">
                            Recuperar Password?
                        </a>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="<?php echo site_url('ctr_geral/RegistoView')?>">
                            Registe-se
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
        
                </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>